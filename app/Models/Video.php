<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    protected $table = 'videos';
    protected $fillable = [

        'link',
        'lesson_id',
    ];
    public $timestamps = false;


    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}
