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
        /*
        $user = Auth::user();
        return view('user.index', compact('user'));
        */
        $users = User::with('roles','education', 'skills', 'works', 'activities', 'projects', 'posts', 'projects.testimonials', 'works.responsibilities')->latest()->get();
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
        // $user = User::find($id);
/* (pasado a UserRequest)
        $request->validate([
            'name' => 'required | min:5 | max:64',
            'job_title' => 'required | min:5 | max:64',
            'address' => 'required | min:5 | max:64',
            'phone_number' => 'required | numeric | min:5 | max:12',
        //    'file' => 'image | dimensions:min_width=100,min_height=200 | size:512',
            'file' => 'mimes:jpeg | dimensions:min_width=100,min_height=200 | size:512',
        ]);
*/
        if ($request->file('file')) {
            Storage::disk('public')->delete($user->image);
            $user->image = $request->file('file')->store('users', 'public');
            $user->save();
        }

        $user->update($request->all());
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
        $user = User::find($id);

        if ($user->image) {
            Storage::disk('public')->delete($user->image);
        }

        $user->delete();

        return redirect()->to('user');
    }
}
