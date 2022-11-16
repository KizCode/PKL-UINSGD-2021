<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'des'
    ];

    public function gol(){
        return $this->hasMany(Gol::class);
    }
}
