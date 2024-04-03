<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kendaraan extends Model
{
    use HasFactory;

    protected $table = 'kendaraans';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'code_kendaraan',
        'merk_kendaraan',
        'model_kendaraan',
        'plat_kendaraan',
        'nominal_denda',
        'status_kendaraan',
        'create_at',
        'update_at',
    ];
}

