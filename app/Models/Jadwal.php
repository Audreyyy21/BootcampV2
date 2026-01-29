<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwal';

    protected $fillable = [
    'user_id',
    'kelas_id',
    'tanggal_mulai',
    'tanggal_selesai',
    'status',
    'gmeet_link',
    'is_hadir',
    'hadir_at',
];


protected $casts = [
    'is_hadir' => 'boolean',
    'hadir_at' => 'datetime',
];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
