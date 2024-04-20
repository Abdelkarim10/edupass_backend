<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class McqsTaken extends Model
{
    protected $table = 'mcqs_takens';
    use HasFactory;

    protected $fillable = [

        'mcq_id',
        "answer_id",
        "assessment_taken_id"
    ];
    public $timestamps = false;

    public function assessmentTaken()
    {
        return $this->belongsTo(AssessmentTaken::class);
    }
    public function answer()
    {
        return $this->hasOne(Answer::class);
    }

    public function mcq()
    {
        return $this->belongsTo(Mcq::class);
    }
    public function assessment_taken()
    {
        return $this->hasMany(Assessment::class);
    }
}
