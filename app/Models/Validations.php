<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Validations extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;
    
    public function validator()
    {
        return $this->belongsTo(Validators::class, 'validator_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(JobCategories::class, 'job_category_id', 'id');
    }

    public function society() {
        $this->belongsTo(Societies::class, 'society_id', 'id');
    }
}
