<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class peminjaman_kendaraan extends Model
{
    use HasFactory;

    protected $table = 'peminjaman_kendaraans';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'code_peminjamaan',
        'code_kendaraan',
        'code_pengguna',
        'tanggal_mulai',
        'tanggal_selesai',
        'status_kendaraan',
        'waktu_sewa',
        'status_peminjamaan',
        'create_at',
        'update_at',
    ];
}
