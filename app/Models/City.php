<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $casts = [
        'name' => 'array'
    ];

    public function district()
    {
        return $this->belongsTo(District::class);
    }



}
