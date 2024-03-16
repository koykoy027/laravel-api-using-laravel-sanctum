<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'id' => (string)$this->id,
            'data' => [
                'firstname' => $this->user_profile->firstname,
                'middlename' => $this->user_profile->middlename,
                'lastname' => $this->user_profile->lastname,
            ],
            'created' => [
                StudentResource::collection($this->students),
                // 'id' => $this->students,
            ]
        ];
    }
}