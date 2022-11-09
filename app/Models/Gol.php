<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gol extends Model
{
    use HasFactory;

    protected $filllable = [
        'jepe',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');

    }


}
