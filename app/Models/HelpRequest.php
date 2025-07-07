<?php
// File: app/Models/HelpRequest.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HelpRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'kategori',
        'detail_pertolongan',
        'tanggal_pertolongan',
        'waktu_mulai',
        'waktu_selesai',
        'lokasi',
        'nama_pemohon',
        'kontak_pemohon',
        'status',
    ];

    /**
     * Setiap permintaan pertolongan dimiliki oleh satu User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}