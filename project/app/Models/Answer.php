<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Answer extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function question(): HasOne
    {
        return $this->hasOne(Question::class);
    }

    public function answer(): HasOne
    {
        return $this->hasOne(Answer::class);
    }
}
