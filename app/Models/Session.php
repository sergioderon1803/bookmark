<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    public $timestamps = false; // No hay created_at / updated_at
    protected $primaryKey = 'id';
    public $incrementing = false; // El id es string
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'user_id',
        'ip_address',
        'user_agent',
        'payload',
        'last_activity'
    ];

    // Relación con User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
