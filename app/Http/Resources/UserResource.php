<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'email' => $this['email'],
            'display_name' => $this['display_name'],
            'profile_image' => $this['profile_image'],
            'phone' => $this['phone'],
        ];
    }
}
