<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mcq extends Model
{
    protected $table = 'mcqs';
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'question',
        'assessment_id',
        'mcq_pic'
    ];

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function assessment()
    {
        return $this->belongsTo(Assessment::class);
    }

    public function mcq_taken()
    {
        return $this->hasMany(McqsTaken::class);
    }
}
