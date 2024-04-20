<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dictionary extends Model
{ 
    use HasFactory;
    
    protected $fillable = [
        'word',
        'meaning',
        'lesson_id'

    ];
    public $timestamps = false;

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}
