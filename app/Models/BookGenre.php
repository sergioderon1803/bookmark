<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookGenre extends Model
{
    protected $table = 'book_genre';

    protected $fillable = ['book_id', 'genre_id'];

    public $timestamps = true; // porque la tabla tiene timestamps
}
