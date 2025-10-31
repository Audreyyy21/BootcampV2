<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = "kelas";

    protected $fillable = [
        'nama_kelas',
        'deskripsi',
        'gambar',
        'harga',
        'status',
    ];

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'jadwal')
            ->withPivot('tanggal_mulai', 'tanggal_selesai', 'status')
            ->withTimestamps();
    }
}
