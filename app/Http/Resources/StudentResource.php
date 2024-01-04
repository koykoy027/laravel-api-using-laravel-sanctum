<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
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
            'data' => [
                'firstname' => $this->firstname,
                'middlename' => $this->middlename,
                'lastname' => $this->lastname,
                'gender' => $this->gender,
                'email' => $this->email,
                'created_by' => $this->created_by,
                'updated_by' => $this->updated_by,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
            ],
            'created_by' => [
                'id' => (string)$this->user_created_by->id,
                'firstname' => $this->user_created_by->firstname,
                'middlename' => $this->user_created_by->middlename,
                'lastname' => $this->user_created_by->lastname,
            ],

            'updated_by' => [
                'id' => (string)$this->user_updated_by->id,
                'firstname' => $this->user_updated_by->firstname,
                'middlename' => $this->user_updated_by->middlename,
                'lastname' => $this->user_updated_by->lastname,
            ],

        ];
    }
}
