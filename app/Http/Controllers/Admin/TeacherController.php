<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Teacher;
use App\Http\Resources\TeacherResource;
use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use App\Repository\Admin\TeacherRepository;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{

    public $teacher;

    public function __construct(TeacherRepository $teacher)
    {
        $this->teacher = $teacher;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = cache()->rememberForever('teacher:all', function () {
            return Teacher::orderBy('created_at', 'DESC')->get();
        });
        
        if($teachers->isEmpty()) {
            return response()->json('teachers Is Empty');
        }

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
        $data = $request->all();

        $this->teacher->saveTeacher($request, $data);

        cache()->forget('teacher:all');

       return response()->json([
           'message' => 'Teacher Saved Successfully'
       ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $teacher = Teacher::find($id);

        if(! $teacher) {
            return response()->json('teacher Not Found');
        }

        $teacherShow = cache()->rememberForever('teacher:'. $teacher->id, function () use($teacher) {
            return $teacher;
        });

        return new TeacherResource($teacherShow);
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
    public function update(UpdateTeacherRequest $request, $id)
    {
        $teacher = Teacher::find($id);

        if(! $teacher) {
            return response()->json('teacher Not Found');
        }

         $data = $request->all();

         $this->teacher->updateTeacher($request, $teacher, $data);

         cache()->forget('teacher:'. $teacher->id);
         cache()->forget('teacher:all');
 

        return response()->json([
            'message' => 'Teacher Updated Successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher = Teacher::find($id);

        if(! $teacher) {
            return response()->json('teacher Not Found');
        }

        $this->teacher->removeTeacher($teacher);

        cache()->forget('teacher:'. $teacher->id);
        cache()->forget('teacher:all');


        return new TeacherResource($teacher);
    }
}
