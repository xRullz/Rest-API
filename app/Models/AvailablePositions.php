<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvailablePositions extends Model
{
    use HasFactory;

    protected $hidden = [
        'id',
        'job_vacancy_id',
    ];
    public function job()
    {
        $this->belongsTo(JobVacancies::class, 'job_vacancy_id');
    }
}
