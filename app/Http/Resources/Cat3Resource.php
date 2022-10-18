<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Cat3Resource extends JsonResource
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
            'data' => 'ClassType',
            'attributes' => [
                'classType' => new ClassTypeResource($this->classType),
                'teacher' => new TeacherResource($this->teacher),
                'subject' => new SubjectResource($this->subject),
                'student_id' => new StudentResource($this->student),
                'score' => $this->score,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
            ]
        ];
    }
}
