<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CrewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request): array
    {
        return [
            'id' => $this['id'],
            'name' => $this['name'],
            'role' => $this['status'] == 1 ? 'cast' : ($this['status'] == 2 ? 'director' : 'producer'),
            'created_at' => $this['created_at']
        ];
    }
}
