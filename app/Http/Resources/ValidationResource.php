<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ValidationResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'status' => $this->status,
            'work_experience' => $this->work_experience,
            'job_category_id' =>$this->category,
            'job_position' => $this->job_position,
            'reason_accepted' => $this->reason_accepted,
            'validator_notes' => $this->validator_notes,
            'validator' => $this->validator,
        ];
    }
}
