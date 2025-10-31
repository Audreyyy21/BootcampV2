<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sertifikat extends Model
{
    use HasFactory;

    protected $table = 'sertifikat';

    protected $fillable = [
        'user_id',
        'kelas_id',
        'nomor_sertifikat',
        'link',
        'tanggal_diterbitkan',
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
