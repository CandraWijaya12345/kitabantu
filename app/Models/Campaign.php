<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'judul',
        'slug',             // <-- DITAMBAHKAN
        'kategori',         // <-- DITAMBAHKAN
        'deskripsi_singkat',// <-- DIPERBARUI
        'deskripsi_lengkap',// <-- DITAMBAHKAN
        'target_dana',
        'dana_terkumpul',
        'batas_waktu',
        'gambar_url',
        'status',
    ];

    /**
     * Mendefinisikan relasi bahwa setiap campaign dimiliki oleh satu User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}