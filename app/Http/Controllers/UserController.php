<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('roles','education', 'skills', 'works', 'activities', 'projects', 'posts', 'networks', 'projects.testimonials','works.responsibilities')->latest()->get();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    public function edit(User $user)
    {
        // Si no es admin chequear que sea el propio usuario:
        if (Auth::user()->hasRole('client')) {
            if(Auth::user()->id === $user->id){

                return view('admin.users.edit', compact('user'));
            
            } 
            return view('admin.users.403');
        }

        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    public function update(UserRequest $request, User $user)
    {
        // Si no es admin chequear que sea el propio usuario:
        if (Auth::user()->hasRole('client')) {
            if (Auth::user()->id != $user->id) {
                return view('admin.users.403');
            }
        }

        if ($request->file('file')) {
            Storage::disk('public')->delete($user->image);
            $user->image = $request->file('file')->store('users', 'public');
            $user->save();
        }

        $user->update($request->all());

        if ($request->file('about_img')) {
            Storage::disk('public')->delete($user->about_img);
            $user->about_img = $request->file('about_img')->store('about', 'public');           
            $user->save();            
        }

        $id = $user->id;
        return redirect()->to('user/' . $id . '/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // No permitir borrar el usuario admin:
        if ($id == 1) {
            return view('admin.users.403');
        }

        // Si no es admin chequear que sea el propio usuario:
        if (Auth::user()->hasRole('client')) {
            if (Auth::user()->id != $id) {
                return view('admin.users.403');
            }
        }

        $user = User::find($id);

        if ($user->image) {
            Storage::disk('public')->delete($user->image);
        }
        if ($user->about_img) {
            Storage::disk('public')->delete($user->about_img);
        }
        $user->delete();

        return redirect()->to('users');
    }

    /**
     * Logout.
     *
     *
     */
    public function logout_user()
    {
        Auth::logout();

        $users = User::all();

        if ($users) {
            return view('home')->with('users', $users);
        }
    }
    
}
