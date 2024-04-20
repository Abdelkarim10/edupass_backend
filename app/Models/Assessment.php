<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    protected $table = 'assessments';
    use HasFactory;
    protected $fillable = [
        'name',
        'course_id',
        'lesson_id'
    ];
    public $timestamps = false;
    public function course()
    {
        return $this->hasOne(Course::class);
    }
    public function mcqs()
    {
        return $this->hasMany(Mcq::class);
    }
    public function lesson()
    {
        return $this->hasOne(Lesson::class);
    }
    public function assessmentTaken()
    {
        return $this->hasMany(AssessmentTaken::class);
    }
}
