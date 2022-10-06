<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    public $fillable = ['laporlembur', 'jammasuk', 'jamkeluar', 'tanggal', 'jenislembur'];
    // membuat fitur created_at(kapan data dibuat) & updated_at (kapan data diedit)
    // aktif
    public $timestamps = true;

    public function siswa()
    {
        // data dari model 'Guru' bisa memiliki banyak data
        // dari model 'Siswa' melalui id_guru
        return $this->hasMany(Siswa::class, 'id_guru');
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