<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gol extends Model
{
    use HasFactory;
#
    protected $guarded = ['id'];
    public $fillable = [
        'gol',
        'jbtn',
        'jepe',
    ];

}
