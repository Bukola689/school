<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReportCardResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => (string)$this->id,
            'data' => 'Report Card',
            'attributes' => [
                'classType' => new ClassTypeResource($this->classType),
                'term' => new TermResource($this->term),
                'teacher' => new TeacherResource($this->teacher),
                'subject' => new SubjectResource($this->subject),
                'session' => new SessionResource($this->session),
                'student' => new StudentResource($this->student),
                'cat1' => new Cat1Resource($this->cat1),
                'cat2' => new Cat2Resource($this->cat2),
                'cat3' => new Cat3Resource($this->cat3),
                'examination' => new ExaminationResource($this->examination),
                'position' => $this->position,
                'percentage' => $this->percentage,
                'comments' => $this->comments,
                'user' => new UserResource($this->user),
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
            ]
        ];
    }
}
