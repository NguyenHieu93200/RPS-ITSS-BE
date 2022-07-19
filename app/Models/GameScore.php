<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameScore extends Model
{   

    use HasFactory;
    protected $table = 'game_scores';

    protected $fillable = [
        'user_id', 'score','created_at','updated_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
