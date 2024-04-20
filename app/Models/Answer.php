<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{

    protected $fillable = [
        'text',
        'right_answer',
        'mcq_id'
    ];
    public $timestamps = false;
    protected $table = 'answers';
    use HasFactory;
    public function mcq()
    {
        return $this->belongsTo(Mcq::class);
    }
    public function mcq_taken()
    {
        return $this->hasMany(Mcq::class);
    }
}
