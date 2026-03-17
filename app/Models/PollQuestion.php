<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PollQuestion extends Model
{
    protected $table = 'poll_question'; // your table name

    protected $fillable = [
        'question_text',
    ];

    public function choices()
    {
        return $this->hasMany(PollChoice::class, 'question_id');
    }

    public function votes()
    {
        return $this->hasMany(Vote::class, 'question_id');
    }
}