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
        'lembur_id',
        'pekerjaan_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');

    }

    public function lembur()
    {
        return $this->belongsTo(Lembur::class, 'lembur_id');

    }
    public function pekerjaan()
    {
        return $this->belongsTo(Pekerjaan::class, 'pekerjaan_id');
    }


}
