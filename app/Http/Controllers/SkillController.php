<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
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

        $skill = Skill::create([
            'name' => $data['name'],
            'user_id' => intval($data['user_id']),
            'percent' => $data['percent'],
            'type' => 'technical'
        ]);

        $status = $skill->save();

        return redirect()->to('user/' . $data['user_id'] . '/edit')->with('status', $status)->with('action', 'creada');
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
    // public function update(Request $request, $id)
    public function update(Request $request, Skill $skill)
    {
        $status = $skill->update($request->all());

        return redirect()->to('user/' . $skill->user_id . '/edit')->with('status', $status)->with('action', 'modificada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    public function destroy(Skill $skill)
    {
        $id = $skill->user_id;

        $skill = Skill::find($skill->id);
        $status = $skill->delete();

        return redirect()->to('user/' . $id . '/edit')->with('status', $status)->with('action', 'eliminada');
    }
}
