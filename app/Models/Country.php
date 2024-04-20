<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $casts = [
        'name' => 'array'
    ];

    public function governorates()
    {
        return $this->hasMany(Governorate::class);
    }

}
