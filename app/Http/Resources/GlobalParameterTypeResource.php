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
                'id' => $this->id ?? null,
                'name' => $this->name ?? null,
                'description' => $this->description ?? null,
                'is_active' => $this->is_active ?? null,
                'created_by' => $this->created_by ?? null,
                'updated_by' => $this->updated_by ?? null,
            ],
            // 'parameters' => [
            //     'id' => $this->globalParameter->id ?? null,
            //     'name' => $this->globalParameter->name ?? null,
            //     'description' => $this->globalParameter->description ?? null,
            //     'is_active' => $this->globalParameter->is_active ?? null,
            // ],

            'created_by' => [
                'id' => $this->createdByUser->id ?? null,
                'firstname' => $this->createdByUser->firstname ?? null,
                'middlename' => $this->createdByUser->middlename ?? null,
                'lastname' => $this->createdByUser->lastname ?? null,
            ],
        ];
    }
}
