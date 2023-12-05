<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplySocieties extends Model
{
    use HasFactory;

    protected $table = 'job_apply_societies';
    protected $guarded = [];
    public $timestamps = false;

    public function vacancy()
    {
        return $this->hasMany(JobVacancies::class, 'job_vacancy_id');
    }
}
