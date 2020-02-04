<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Skill;

class SkillController extends Controller
{
    /**
     * Display a listing of the skills.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function index() {
        $skills = Skill::latest()->paginate(5);
        return view('skills.index',compact('skills'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new skill.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function create() {
        return view('skills.create');
    }



    /**
     * Store a newly created skill in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        Skill::create($request->all());

        return redirect()->route('skills.index')
            ->with('success','Skill created successfully.');
    }

    /**
     * Display the specified skill.
     *
     * @param  \App\Skill  $skill
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function show(Skill $skill) {
        return view('skills.show',compact('skill'));
    }

    /**
     * Show the form for editing the specified skill.
     *
     * @param  \App\Skill  $skill
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function edit(Skill $skill) {
        return view('skills.edit',compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Skill $skill
     * @return \Illuminate\Http\RedirectResponse
     */

    public function update(Request $request, Skill $skill) {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $skill->update($request->all());

        return redirect()->route('skills.index')
            ->with('success','Skills updated successfully');
    }

    /**
     * Remove the specified skill from storage.
     *
     * @param  \App\Skill $skill
     * @return \Illuminate\Http\RedirectResponse
     */

    public function destroy(Skill $skill) {

        $skill->delete();

        return redirect()->route('skills.index')
            ->with('success','Skill deleted successfully');
    }
}
