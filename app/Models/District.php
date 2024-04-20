<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $casts = [
        'name' => 'array'
    ];

    public function governorate()
    {
        return $this->belongsTo(Governorate::class);
    }

    public function cities()
    {
        return $this->hasMany(City::class);
    }



}
