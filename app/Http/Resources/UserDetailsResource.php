<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserDetailsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'middlename' => $this->middlename,
            'studentId' => $this->studentId,
            'birthday' => $this->birthday,
            'yearlevel' => $this->yearlevel,
            'course' => $this->course,
            'userType' => $this->userType,
            'userId' => $this->userId,
            'created_at' => $this->created_at
        ];
    }
}
