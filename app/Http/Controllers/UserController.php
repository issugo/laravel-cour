<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Skill;
use App\SkillUser;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index() {
        $user = Auth::user();
        $skills = $user->skills;
        return view('myComp', compact('skills'));
    }

    public function all() {
        $users = User::all();
        return view('competences', compact('users'));
    }

    public function newComp(Request $request) {
        $user = Auth::user();
        $skills = Skill::all();
        $insertion = '';
        if ($request->isMethod('post')) {
            if($request->input('PHP') == "on") {
                $user->skills()->attach(Skill::where('name', 'PHP')->get('id'), ['level' => $request->input('PHPLevel')]);
            }
            if($request->input('JavaScript') == "on") {
                $user->skills()->attach(Skill::where('name', 'JavaScript')->get('id'), ['level' => $request->input('PHPLevel')]);
            }
            if($request->input('Python') == "on") {
                $user->skills()->attach(Skill::where('name', 'Python')->get('id'), ['level' => $request->input('PHPLevel')]);
            }
            if($request->input('HTML5 - CSS3') == "on") {
                $user->skills()->attach(Skill::where('name', 'HTML5 - CSS3')->get('id'), ['level' => $request->input('PHPLevel')]);
            }
            $insertion = 'les compétences ont bien été insérées';
        }
        return view('ajouterCompetence', ['insertion' => $insertion, 'skills' => $skills, 'user' => $user]);
    }

    public function deleteComp($compName) {
        $champ = SkillUser::where('user_id', Auth::user()->id)->whereIn('skill_id', Skill::where('name', $compName)->get('id'))->get();
        SkillUser::supr($champ);
        //return redirect()->route('myComp');
    }
}
