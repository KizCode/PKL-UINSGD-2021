<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lembur extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public $fillable = [
        'htgl',
        'waktu',
        'kgtn' => "Lembur",
        'urai',
    ];
    public $timestamps = true;
}
