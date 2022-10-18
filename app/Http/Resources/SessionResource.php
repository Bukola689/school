<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SessionResource extends JsonResource
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
            'data' => 'Sessions',
            'attributes' => [
                'sec_year' => $this->sec_year,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,      
            ]
        ];
    }
}
