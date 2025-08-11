<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = ['name', 'biography'];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected static function booted()
    {
        static::addGlobalScope('order', function ($query) {
            $query->orderBy('name');
        });
    }

    public function books()
    {
        return $this->hasMany(Book::class);
    }

    // Scope para búsquedas rápidas
    public function scopeSearch($query, $term)
    {
        return $query->where('name', 'like', "%{$term}%");
    }
}
