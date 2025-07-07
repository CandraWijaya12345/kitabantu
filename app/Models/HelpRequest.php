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
        'volunteer_id',
    ];

    /**
     * Setiap permintaan pertolongan dimiliki oleh satu User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

        public function volunteer()
    {
        return $this->belongsTo(User::class, 'volunteer_id');
    }
}