<?php

declare(strict_types=1);

namespace App\Http\Resources\Api\V1;

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
            'firstName' => $this->first_name ?? null,
            'lastName' => $this->last_name ?? null,
            'phone' => $this->phone ?? null,
            'job' => $this->job ?? null,
            'avatar_src' => $this->avatar_src ?? null,
            'created_at' => $this->created_at ?? null
        ];
    }
}
