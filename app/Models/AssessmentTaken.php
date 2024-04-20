<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssessmentTaken extends Model
{
    public $timestamps = false;
    protected $fillable = [

        'assessment_id',
        'user_id',
    ];

    use HasFactory;

    public function assessment()
    {
        return $this->belongsTo(Assessment::class);
    }

    public function mcqsTakens()
    {
        return $this->hasMany(McqsTaken::class,);
    }
    public function user()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }
}
