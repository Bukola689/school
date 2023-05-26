<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TeacherResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $user = $this->whenLoaded('user');

        return [
            'id' => (string)$this->id,
            'data' => 'Teachers',
            'attributes' => [
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'age' => $this->age,
                'occupation' => new OccupationResource($this->occupation),
                'd_o_b' => $this->d_o_b,
                'gender' => $this->gender,
                'phone_number' => $this->phone_number, 
                'country' => new CountryResource($this->country),
                'state' => new StateResource($this->state),
                'localGovernment' => new LocalGovernmentResource($this->localGovernment),
                'qualification' => $this->qualification,
                'image' => $this->image,
                'address' => $this->address,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
                'user' => $this->user_id,
            ]
        ];
    }
}
