<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Skill;
use App\Http\Requests\SkillRequest;

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
     * @param  \App\Http\Requests\SkillRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SkillRequest $request)
    {
        $data = $request->all();

        // Si no es admin chequear que sea el propio usuario:
        if (Auth::user()->hasRole('client')) {
            if (Auth::user()->id != $data['user_id']) {
                return view('admin.users.403');
            }
        }

        $skill = Skill::create([
            'name' => $data['skill-name'],
            'user_id' => intval($data['user_id']),
            'percent' => $data['percent'],
            'type' => $data['type'],
        ]);

        $status = $skill->save();

        return redirect()->to('user/' . $data['user_id'] . '/edit')->with('status', $status)->with('action', 'creada')->with('field', 'habilidad');
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
     * @param  \App\Http\Requests\SkillRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    public function update(SkillRequest $request, Skill $skill)
    {
        $user_id = $skill->user_id;

        // Si no es admin chequear que sea el propio usuario:
        if (Auth::user()->hasRole('client')) {
            if (Auth::user()->id != $user_id) {
                return view('admin.users.403');
            }
        }
        
        $data = $request->all();

        $status = $skill->update([
            'user_id' => $user_id,
            'name' => $data['skill-name'],
            'percent' => $data['percent'],
            'type' => $data['type'],
        ]);

        return redirect()->to('user/' . $user_id . '/edit')->with('status', $status)->with('action', 'modificada')->with('field', 'habilidad');
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
        $user_id = $skill->user_id;

        // Si no es admin chequear que sea el propio usuario:
        if (Auth::user()->hasRole('client')) {
            if (Auth::user()->id != $user_id) {
                return view('admin.users.403');
            }
        }

        $skill = Skill::find($skill->id);
        $status = $skill->delete();

        return redirect()->to('user/' . $user_id . '/edit')->with('status', $status)->with('action', 'eliminada')->with('field', 'habilidad');
    }
}
