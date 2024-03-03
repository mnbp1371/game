<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'point',
        'question_id',
        'game_id',
    ];
}
