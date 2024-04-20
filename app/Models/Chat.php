<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    public function user()
    {
        return User::find($this->user_id);
    }

    public function assistant()
    {
        return User::find($this->assistant_id);
    }
}
