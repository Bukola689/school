<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MarkSheetResource extends JsonResource
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
            'data' => 'Mark Sheet',
            'attributes' => [
                'classType' => new ClassTypeResource($this->classType),
                'session' => new ClassTypeResource($this->session),
                'term' => new TermResource($this->term),
                'subject' => new SubjectResource(($this->subject)),
                'teacher' => new TeacherResource($this->teacher),
                'student' => new StudentResource($this->student),
                'mark_date' => $this->mark_date,
                'cat1' => new Cat1Resource($this->cat1),
                'cat2' => new Cat2Resource($this->cat2),
                'cat3' => new   Cat3Resource($this->cat3),
                'examination' => new ExaminationResource($this->examination),
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
            ]
        ];
    }
}
