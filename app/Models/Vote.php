<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\PollQuestion;
use App\Models\PollChoice;

class Vote extends Model
{
    use HasFactory;
    protected $table = 'poll_vote'; // your existing table

    // Allow mass assignment
    protected $fillable = [
        'user_id',
        'question_id',
        'choice_id',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function question()
    {
        return $this->belongsTo(PollQuestion::class, 'question_id');
    }

    public function choice()
    {
        return $this->belongsTo(PollChoice::class, 'choice_id');
    }
}