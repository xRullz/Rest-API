<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobVacancies extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(JobCategories::class, 'job_category_id', 'id');
    }

    public function job()
    {
        return $this->hasMany(AvailablePositions::class, 'job_vacancy_id', 'id');
    }

    public function societie()
    {
        return $this->hasMany(ApplySocieties::class, 'job_vacancy_id', 'id');
    }
}
