<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PromotionResource extends JsonResource
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
            'data' => 'Promotion',
            'attributes' => [
                'classType' => new ClassTypeResource($this->classType),
                'teacher' => new TeacherResource($this->teacher),
                'session' => new SessionResource($this->session),
                'student' => new StudentResource($this->student),
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
            ]
        ];
    }
}
