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
            'data' => [
                'id' => $this->id,
                'name' => $this->name,
                'description' => $this->description,
                'is_active' => $this->is_active,
                'created_by' => $this->created_by,
                'updated_by' => $this->updated_by,
            ],
            // 'parameters' => [
            //     'id' => $this->globalParameter->id ?? null,
            //     'name' => $this->globalParameter->name ?? null,
            //     'description' => $this->globalParameter->description ?? null,
            //     'is_active' => $this->globalParameter->is_active ?? null,
            // ],

            'created_by' => [
                'id' => $this->createdByUser->userProfile->id ?? null,
                'firstname' => $this->createdByUser->userProfile->firstname ?? null,
                'middlename' => $this->createdByUser->userProfile->middlename ?? null,
                'lastname' => $this->createdByUser->userProfile->lastname ?? null,
            ],
        ];
    }
}
