<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';
    use HasFactory;
    protected $fillable = [
        'name',
        'grade_id',
        'assessment_id',
        'course_pic'
    ];
    protected $hidden = [

        'two_factor_recovery_codes',
        'two_factor_confirmed_at',
        'created_at',
        'updated_at'
    ];
    public $timestamps = false;

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }


    public function assessment()
    {
        return $this->belongsTo(Assessment::class);
    }
    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function assistants()
    {
        return $this->belongsToMany(User::class, "assistant_courses");
    }
}
