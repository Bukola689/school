<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TimeTableResource extends JsonResource
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
            'data' => 'TimeTable',
            'attributes' => [
                'classType' => new ClassTypeResource($this->classType),
                'term' => new TermResource($this->term),
                'subject' => new SubjectResource(($this->subject)),
                'teacher' => new TeacherResource($this->teacher),
                'session' => new SessionResource($this->session),
                'created_at' => $this->created_at,
            ]
        ];
    }
}
