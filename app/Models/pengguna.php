<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengguna extends Model
{
    use HasFactory;

    protected $table = 'pengguna';
    protected $primaryKey = 'code_account';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'code_pengguna',
        'code_account',
        'nama',
        'alamat',
        'no_hp',
        'no_sim',
        'created_at',
        'updated_at'
    ];
}
