<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Models\Skill;
use App\Models\Type;

class SkillsController extends Controller
{

    public function list()
    {
        // return Skill::all();
        return view('skills.list', [
            'skills' => Skill::all()
        ]);
    }

    public function addForm()
    {
        return view('skills.add', [
            'types' => Type::all(),
        ]);
    }
    
    public function add()
    {

        $attributes = request()->validate([
            'skill' => 'required',
            'level' => 'required',
            'slug' => 'required|unique:skills|regex:/^[A-z\-]+$/'
       
        ]);

        $skill = new Skill();
        $skill->skill = $attributes['skill'];
        $skill->level = $attributes['level'];
        $skill->slug = $attributes['slug'];
        $skill->user_id = Auth::user()->id;
        $skill->save();

        return redirect('/console/skills/list')
            ->with('message', 'skill has been added!');
    }

    public function editForm(Skill $skill)
    {
        return view('skills.edit', [
            'skill' => $skill,
            'types' => Type::all(),
        ]);
    }

    public function edit(Skill $skill)
    {

        $attributes = request()->validate([
            'skill' => 'required',
            'level' => 'required',
            'slug' => [
                'required',
                Rule::unique('skills')->ignore($skill->id),
                'regex:/^[A-z\-]+$/',
            ]
        ]);

        $skill->skill = $attributes['skill'];
        $skill->level = $attributes['level'];
        $skill->slug = $attributes['slug'];      

        $skill->save();

        return redirect('/console/skills/list')
            ->with('message', 'skill has been edited!');
    }

    public function delete(Skill $skill)
    {
        $skill->delete();
        
        return redirect('/console/skills/list')
            ->with('message', 'skill has been deleted!');        
    }


    
}
