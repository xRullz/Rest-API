<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Societies extends Model
{
    use HasFactory, HasApiTokens;

    protected $fillable = [
        'id_card_number',
        'name',
        'password',
        'born_date',
        'address',
        'regional_id',
        'gender',
        'login_tokens'
    ];

    public $timestamps = false;


    protected $hidden = [
        'password', 'id', 'regional_id'
    ];

    // protected $casts = [
    //     'password' => 'hashed',
    // ];

    public function regional()
    {
        return $this->belongsTo(Regional::class);
    }

    public function validation() {
        $this->hasOne(Validations::class);
    }
}
