<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Activity;
use Illuminate\Http\Request;
use App\Http\Requests\ActivityRequest;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(ActivityRequest $request)
    {
        $data = $request->all();

        // Si no es admin chequear que sea el propio usuario:
        if (Auth::user()->hasRole('client')) {
            if (Auth::user()->id != $data['user_id']) {
                return view('admin.users.403');
            }
        }

        $activity = Activity::create([
            'title' => $data['activity-title'],
            'user_id' => intval($data['user_id']),
            'description' => $data['activity-description'],
        ]);

        $status = $activity->save();

        return redirect()->to('user/' . $data['user_id'] . '/edit')->with('status', $status)->with('field', 'La actividad')->with('action', 'creada');

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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ActivityRequest $request, Activity $activity)
    {
        // Si no es admin chequear que sea el propio usuario:
        if (Auth::user()->hasRole('client')) {
            if (Auth::user()->id != $activity->user_id) {
                return view('admin.users.403');
            }
        }

        $data = $request->all();

        $status = $activity->update([
            'title' => $data['activity-title'],
            'description' => $data['activity-description'],
            'user_id' => $activity->user_id,
        ]);

        return redirect()->to('user/' . $activity->user_id . '/edit')->with('status', $status)->with('field', 'La actividad')->with('action', 'modificada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $activity)
    {
        $user_id = $activity->user_id;

        // Si no es admin chequear que sea el propio usuario:
        if (Auth::user()->hasRole('client')) {
            if (Auth::user()->id != $user_id) {
                return view('admin.users.403');
            }
        }

        $activity = Activity::find($activity->id);
        $status = $activity->delete();

        return redirect()->to('user/' . $user_id . '/edit')->with('status', $status)->with('field', 'La actividad')->with('action', 'eliminada');
    }
}
