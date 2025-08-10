<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = [
        'user_book_id',
        'rating',
    ];

    public function userBook()
    {
        return $this->belongsTo(UserBook::class);
    }
}
