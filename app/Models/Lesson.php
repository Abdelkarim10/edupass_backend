<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'course_id',
        'assessment_id'
    ];
    public $timestamps = false;
    protected $hidden = [
        'updated_at',
        'field list',
        'created_at'

    ];
    public function assessment()
    {
        return $this->belongsTo(Assessment::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function pdfs()
    {
        return $this->hasMany(Pdf::class);
    }
    public function videos()
    {
        return $this->hasMany(Video::class);
    }
    public function dictionaries()
    {
        return $this->hasMany(Dictionary::class);
    }
}
