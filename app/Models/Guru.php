<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public $fillable = [
        'htgl',
        'waktu',
        'kgtn' => "Lembur",
        'urai',
    ];
    // membuat fitur created_at(kapan data dibuat) & updated_at (kapan data diedit)
    // aktif
    public $timestamps = true;

    public function lembur()
    {
        return $this->hasMany(User::class);
    }

    public function image()
    {
        if ($this->foto && file_exists(public_path('images/guru/' . $this->foto))) {
            return asset('images/guru/' . $this->foto);
        } else {
            return asset('images/no_image.jpg');
        }
    }

    // mengahupus image(foto) di storage(penyimpanan) public
    public function deleteImage()
    {
        if ($this->foto && file_exists(public_path('images/guru/' . $this->foto))) {
            return unlink(public_path('images/guru/' . $this->foto));
        }
    }
}
