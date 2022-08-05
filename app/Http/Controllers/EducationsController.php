<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Models\Education;
use App\Models\Type;

class EducationsController extends Controller
{

    public function list()
    {
        // return Education::all();
        return view('educations.list', [
            'educations' => Education::all()
        ]);
    }

    public function addForm()
    {
        return view('educations.add', [
            'types' => Type::all(),
        ]);
    }
    
    public function add()
    {

        $attributes = request()->validate([
            'school' => 'required',
            'program' => 'required',
            'slug' => 'required|unique:educations|regex:/^[A-z\-]+$/',
            'start_date' => 'required',
            'end_date' => 'required',
         
        ]);

        $education = new Education();
        $education->school = $attributes['school'];
        $education->program = $attributes['program'];
        $education->slug = $attributes['slug'];
        
        $education->start_date = $attributes['start_date'];
        $education->end_date = $attributes['end_date'];
        $education->user_id = Auth::user()->id;
        $education->save();

        return redirect('/console/educations/list')
            ->with('message', 'Education has been added!');
    }

    public function editForm(Education $education)
    {
        return view('educations.edit', [
            'education' => $education,
            'types' => Type::all(),
        ]);
    }

    public function edit(Education $education)
    {

        $attributes = request()->validate([
            'school' => 'required',
            'program' => 'required',
            'slug' => [
                'required',
                Rule::unique('educations')->ignore($education->id),
                'regex:/^[A-z\-]+$/',
            ],
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $education->school = $attributes['school'];
        $education->program = $attributes['program'];
        $education->slug = $attributes['slug'];      
        $education->start_date = $attributes['start_date'];
        $education->end_date = $attributes['end_date'];
        $education->save();

        return redirect('/console/educations/list')
            ->with('message', 'Education has been edited!');
    }

    public function delete(Education $education)
    {
        $education->delete();
        
        return redirect('/console/educations/list')
            ->with('message', 'Education has been deleted!');        
    }


    
}
