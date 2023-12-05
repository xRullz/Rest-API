<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JobVacanyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'category' => $this->category,
            'company' => $this->company,
            'address' => $this->address,
            'description' => $this->description,
            'available_position' => $this->job
        ];
    }
}
