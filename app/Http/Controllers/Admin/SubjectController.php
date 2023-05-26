<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use App\Http\Resources\SubjectResource;
use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;
use App\Repository\Admin\SubjectRepository;

class SubjectController extends Controller
{
    public $subject;

    public function __construct(SubjectRepository $subject)
    {
        $this->subject = $subject;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = cache()->rememberForever('subject:all', function () {
            return Subject::orderBy('created_at', 'DESC')->get();
        });

        if($subjects->isEmpty()) {
            return response()->json('subjects Is Empty');
        }

        return SubjectResource::collection($subjects);
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
     * @param  \App\Http\Requests\StoreSubjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubjectRequest $request)
    {
       $data = $request->all();

       $this->subject->saveSubject($request, $data);

       cache()->forget('subject:all');

        return response()->json([
            'message' => 'Subject Saved Successfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subject = Subject::find($id);

        if(! $subject) {
            return response()->json('subject Not Found');
        }

        $subjectShow = cache()->rememberForever('subject:'. $subject->id, function () use($subject) {
            return $subject;
        });

        return new SubjectResource($subjectShow);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSubjectRequest  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubjectRequest $request,  $id)
    {
        $subject = Subject::find($id);

        if(! $subject) {
            return response()->json('subject Not Found');
        }

        $data = $request->all();

       $this->subject->updateSubject($request, $subject, $data);

       cache()->forget('subject:'. $subject->id);
       cache()->forget('subject:all');


        return response()->json([
            'message' => 'Subject Update Successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subject = Subject::find($id);

        if(! $subject) {
            return response()->json('subject Not Found');
        }
      
        $this->subject->removeSubject($subject);

        cache()->forget('subject:'. $subject->id);
        cache()->forget('subject:all');


        return response()->json([
            'message' => 'Subject Deleted Successfully !'
        ]);
    }
}
