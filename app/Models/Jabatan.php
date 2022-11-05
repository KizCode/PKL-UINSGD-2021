<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;
    public $fillable = [
        'jabatan',
    ];

    public function user(){
        return $this->hasMany(User::class);
    }
}
