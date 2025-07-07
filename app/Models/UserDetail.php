<?php
// File: app/Models/UserDetail.php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 
        'tanggal_lahir', 
        'jenis_kelamin', 
        'nomor_hp', 
        'alamat', 
        'bio'
    ];
    public function user() { return $this->belongsTo(User::class); }
}