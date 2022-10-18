<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MyParentResource extends JsonResource
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
            'data' => 'Parents',
            'attributes' => [
                'user' => new UserResource($this->user),
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
                'address' => $this->address,
                'age' => $this->age,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
               
            ]
        ];
    }
}
