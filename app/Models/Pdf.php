<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pdf extends Model
{
    protected $table = 'pdfs';
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'file_name',
        'lesson_id',
        'pdf'
    ];
    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}
