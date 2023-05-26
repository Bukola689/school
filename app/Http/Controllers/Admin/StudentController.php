<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Http\Resources\StudentResource;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Repository\Admin\StudentRepository;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public $student;

    public function __construct(StudentRepository $student)
    {
        $this->student = $student;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = cache()->rememberForever('student:all', 60, function () {
            return Student::orderBy('created_at', 'DESC')->get();
        });

        if($students->isEmpty()) {
            return response()->json('student Is Empty');
        }

        return StudentResource::collection($students);
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
     * @param  \App\Http\Requests\StoreStudentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentRequest $request)
    {
      $data = $request->all();

      $this->student->saveStudent($request, $data);

      cache()->forget('student:all');

      return response()->json([
        'message' => 'Student Saved Successfully'
      ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);

        if(! $student) {
            return response()->json('student Not Found');
        }

        $studentShow = cache()->rememberForever('student:'. $student->id, function () use($student) {
            return $student;
        });

        return new StudentResource($studentShow);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStudentRequest  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentRequest $request, $id)
    {  
        $student = Student::find($id);

        if(! $student) {
            return response()->json('student Not Found');
        }
        
        $data = $request->all();

        $this->student->updateStudent($request, $student, $data);

        cache()->forget('student:'. $student->id);
        cache()->forget('student:all');

        return response()->json([
            'message' => 'Student Updated Suucessfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       // $student->delete();

       $student = Student::find($id);

       if(! $student) {
           return response()->json('student Not Found');
       }

        $this->student->removeStudent($student);

        cache()->forget('student:'. $student->id);
        cache()->forget('student:all');

        return response()->json([
            'message' => 'Student Deleted Successfully !'
        ]);
    }
}
