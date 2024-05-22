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
        return [

            'id' => (string)$this->id,
            'email' => $this->user->email ?? null,
            'suffix' => $this->suffix ?? null,
            'firstname' => $this->firstname ?? null,
            'middlename' => $this->middlename ?? null,
            'lastname' => $this->lastname ?? null,
            'gender' => $this->global_parameter_gender->name ?? null,
            'civil_status' => $this->global_parameter_civil_status->name ?? null,
            'religion' => $this->global_parameter_religion->name ?? null,
            'role' => $this->role ?? null,
            'is_admin' => $this->is_admin ?? null,
            'is_required_to_change_password' => $this->is_required_to_change_password ?? null,
            'is_otp_enabled' => $this->is_otp_enabled ?? null,
            'is_active' => $this->is_active ?? null,
        ];
    }
}
