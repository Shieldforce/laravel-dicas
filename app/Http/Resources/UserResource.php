<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            "id"         => $this->id,
            "name"       => $this->name,
            "email"      => $this->email,
            "created_at" => isset($this->created_at) ? $this->created_at->diffForHumans() : null,
            "updated_at" => isset($this->updated_at) ? $this->updated_at->diffForHumans() : null,
        ];
    }
}
