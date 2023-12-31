<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Validators extends Model
{
    use HasFactory;

    public function validation() {
       return $this->hasMany(Validations::class);
    }
}
