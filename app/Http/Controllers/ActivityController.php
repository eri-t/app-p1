<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

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
    public function store(Request $request)
    {
        $data = $request->all();

        $activity = Activity::create([
            'title' => $data['activity-title'],
            'user_id' => intval($data['user_id']),
            'description' => $data['activity-description'],
        ]);

        $status = $activity->save();

        return redirect()->to('user/' . $data['user_id'] . '/edit')->with('status', $status)->with('action', 'creada')->with('field', 'actividad');

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
    public function update(Request $request, Activity $activity)
    {
        $data = $request->all();

        $status = $activity->update([
            'title' => $data['activity-title'],
            'description' => $data['activity-description'],
            'user_id' => $activity->user_id,
        ]);

        // $status = $activity->update($request->all());
        return redirect()->to('user/' . $activity->user_id . '/edit')->with('status', $status)->with('action', 'modificada')->with('field', 'actividad');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $activity)
    {
        $id = $activity->user_id;

        $activity = Activity::find($activity->id);
        $status = $activity->delete();

        return redirect()->to('user/' . $id . '/edit')->with('status', $status)->with('action', 'eliminada')->with('field', 'actividad');
    }
}
