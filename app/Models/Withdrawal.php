<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Withdrawal extends Model
{
    protected $fillable = [
        'campaign_id',
        'jumlah',
        'judul',
        'deskripsi',
        'status',
        'rekening_tujuan', 
    ];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}
