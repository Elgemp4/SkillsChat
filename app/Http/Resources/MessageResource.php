<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "chat_id" => $this->chat_id,
            "created_at" => $this->created_at,
            "role" => $this->role,
            "content" => $this->content
        ];
    }
}
