<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MovieResource extends JsonResource
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
            'description' => $this['description'],
            'initial_release_date' => $this['initial_release_date'],
            'production_company' => $this['production_company'],
            'distributed_by' => $this['distributed_by'],
            'movie_length' => $this['movie_length'],
            'trailer' => $this['trailer'],
            'movie_poster' => $this['movie_poster'],
            'language' => $this['language'],
            'created_at' => $this['created_at'],
            'genres' => GenreResource::collection($this['movie_genres']),
            'crews' => CrewResource::collection($this['movie_crews']),
            'show_time' => new ShowTimeResource($this['showTime'])
        ];
    }
}
