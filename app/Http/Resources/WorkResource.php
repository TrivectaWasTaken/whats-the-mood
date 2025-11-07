<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WorkResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'type' => $this->type,
            'title' => $this->title,
            'year' => $this->year,
            'cover_url' => $this->cover_url,
            'meta' => $this->meta,
        ];
    }
}
