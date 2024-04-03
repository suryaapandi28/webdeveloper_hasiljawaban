<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class account_pengguna extends Model
{
    use HasFactory;

    protected $table = 'account';
    protected $primaryKey = 'code_account';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'user_id',
        'code_account',
        'email',
        'password',
        'status_account',
        'role'
    ];
}
