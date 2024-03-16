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
                'firstname' => $this->userProfile->firstname,
                'middlename' => $this->userProfile->middlename,
                'lastname' => $this->userProfile->lastname,
                'gender' => $this->userProfile->globalParameterGender->name ?? null,
                'civil_status' => $this->userProfile->globalParameterCivilStatus->name ?? null,
                'religion' => $this->userProfile->globalParameterReligion->name ?? null,
            ],
            'created_by' => [
                'id' => $this->globalParameterTypeCreated->id ?? null,
            ],
        ];
    }
}
