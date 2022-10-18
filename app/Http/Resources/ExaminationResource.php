<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ExaminationResource extends JsonResource
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
            'data' => 'Examination',
            'attributes' => [
                'classType' => new ClassTypeResource($this->classType),
                'teacher' => new TeacherResource($this->teacher),
                'subject' => new SubjectResource($this->subject),
                'student' => new StudentResource($this->student),
                'mark' => $this->mark,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
            ]
        ];
    }
}
