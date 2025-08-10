<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBook extends Model
{
    use HasFactory;

    // Nombre exacto de la tabla pivote
    protected $table = 'user_books';

    // No hay campo 'id', usamos clave compuesta
    public $incrementing = false;

    // Si usas clave primaria compuesta, debes indicarlo así
    protected $primaryKey = ['user_id', 'book_id'];

    // Campos asignables
    protected $fillable = [
        'user_id',
        'book_id',
        'status',
    ];

    // Relación con User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación con Book
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
