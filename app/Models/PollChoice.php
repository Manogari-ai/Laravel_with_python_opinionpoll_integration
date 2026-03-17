<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PollChoice extends Model
{
    protected $table = 'poll_choice'; // or your actual table name

    protected $fillable = [
        'question_id',
        'choice_text',
    ];

    public function question()
    {
        return $this->belongsTo(PollQuestion::class, 'question_id');
    }

    public function votes()
    {
        return $this->hasMany(Vote::class, 'choice_id');
    }
}