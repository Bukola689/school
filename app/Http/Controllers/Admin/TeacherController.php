<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Http\Resources\TeacherResource;
use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::orderBy('created_at', 'DESC')->get();

        return TeacherResource::collection($teachers);
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
     * @param  \App\Http\Requests\StoreTeacherRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTeacherRequest $request)
    {
         $image = $request->image;
      
        $originalName = $image->getClientOriginalName();
    
        $image_new_name = 'image-' .time() .  '-' .$originalName;
    
        $image->move('teachers/image', $image_new_name);

        $teacher = new Teacher;
        $teacher->user_id = $request->input('user_id');
        $teacher->first_name = $request->input('first_name');
        $teacher->last_name = $request->input('last_name');
        $teacher->age = $request->input('age');
        $teacher->occupation_id = $request->input('occupation_id');
        $teacher->gender = $request->input('gender');
        $teacher->d_o_b = $request->input('d_o_b');
        $teacher->phone_number = $request->input('phone_number');
        $teacher->image = 'teachers/image/' . $image_new_name;
        $teacher->country_id = $request->input('country_id');
        $teacher->state_id = $request->input('state_id');
        $teacher->local_government_id = $request->input('local_government_id');
        $teacher->address = $request->input('address');
        $teacher->qualification = $request->input('qualification');
        $teacher->save();

        return new TeacherResource($teacher);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        return new TeacherResource($teacher);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTeacherRequest  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTeacherRequest $request, Teacher $teacher)
    {

             if( $request->hasFile('image')) {
  
            $image = $request->image;
  
            $originalName = $image->getClientOriginalName();
    
            $image_new_name = 'image-' .time() .  '-' .$originalName;
    
            $image->move('teachers/image', $image_new_name);
  
            $teacher->image = 'teachers/image/' . $image_new_name;
      }

      //$teacher->user_id = $request->input('user_id');
      $teacher->first_name = $request->input('first_name');
      $teacher->last_name = $request->input('last_name');
      $teacher->age = $request->input('age');
      $teacher->occupation_id = $request->input('occupation_id');
      $teacher->gender = $request->input('gender');
      $teacher->d_o_b = $request->input('d_o_b');
      $teacher->phone_number = $request->input('phone_number');
      $teacher->country_id = $request->input('country_id');
      $teacher->state_id = $request->input('state_id');
      $teacher->local_government_id = $request->input('local_government_id');
      $teacher->address = $request->input('address');
      $teacher->qualification = $request->input('qualification');
      $teacher->update();

        return new TeacherResource($teacher);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        $teacher = $teacher->delete();

        return new TeacherResource($teacher);
    }
}
