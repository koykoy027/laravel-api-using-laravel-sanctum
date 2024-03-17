<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GlobalParameterTypeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => (string)$this->id,
            'name' => $this->name ?? null,
            'description' => $this->description ?? null,
            'is_active' => $this->is_active ?? null,
            'created_by' => [
                'id' => $this->createdBy->userProfile->id ?? null,
                'firstname' => $this->createdBy->userProfile->firstname ?? null,
                'middlename' => $this->createdBy->userProfile->middlename ?? null,
                'lastname' => $this->createdBy->userProfile->lastname ?? null,
            ],
            'updated_by' => [
                'id' => $this->updatedBy->userProfile->id ?? null,
                'firstname' => $this->updatedBy->userProfile->firstname ?? null,
                'middlename' => $this->updatedBy->userProfile->middlename ?? null,
                'lastname' => $this->updatedBy->userProfile->lastname ?? null,
            ],
        ];
    }
}
