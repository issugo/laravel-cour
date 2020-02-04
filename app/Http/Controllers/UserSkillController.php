<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Skill;
use Illuminate\Support\Facades\DB;

class UserSkillController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {
        $skills = Skill::latest()->paginate(5);
        return view('userSkills.index', ['skills' =>$skills, 'user' => Auth::user()]);
    }

    /**
     * Show the form for creating a new link between a user and a skill.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function create() {
        return view('userSkills.create', ['skills' => Skill::all()])
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Store a new relationship between a user and a skill
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */

    /*public function store($id) {
        $u = Auth::user();
        DB::table('skill_user')->insert(['skill_id' => $id, 'user_id' => $u->id, 'level' => 1]);

        return redirect()->route('userSkills.index')
            ->with('success','Skill created successfully.');
    }*/
    public function store($id) {
        return $id;
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function show($id) {
        $skill = Auth::user()->skills->find($id);
        return view('userSkills.show',compact('skill'));
    }

    /**
     * Show the form for editing the specified skill.
     *
     * @param  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function edit($id) {
        $skill = Auth::user()->skills->find($id);
        return view('userSkills.edit',compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $id
     * @return \Illuminate\Http\RedirectResponse
     */

    public function update(Request $request, $id) {
        $request->validate([
            'level' => 'required'
        ]);

        Auth::user()->skills->find($id)->pivot->update(['level' => $request->level]);

        return redirect()->route('userSkills.index')
            ->with('success','Skills updated successfully');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */

    public function destroy($id) {

        Auth::user()->skills->find($id)->pivot->delete();

        return redirect()->route('userSkills.index')
            ->with('success','Skill deleted successfully');
    }
}
