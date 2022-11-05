<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lembur extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public $fillable = [
        'tgl', 'dari', 'sampai', 'waktu', 'kgtn' => "Lembur", 'urai','user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');

    }

    public $timestamps = true;
}
