<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplyPosition extends Model
{
    use HasFactory;

    protected $table = 'job_apply_positions';

    public function apply()
    {
        return $this->hasOne(ApplyPosition::class, 'job_apply_societies_id');
    }

    public function position()
    {
        return $this->hasMany(AvailablePositions::class, 'position_id');
    }
    
    public function vacancy()
    {
        return $this->hasMany(JobVacancies::class, 'job_vacancy_id');
    }

    public function society()
    {
        return $this->hasOne(JobVacancies::class, 'society_id');
    }
}
