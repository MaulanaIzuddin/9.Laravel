<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    protected $table = 'books';

    protected $fillable = [
        'title', 'description', 'price', 'stok', 'cover_photo', 'genre_id', 'author_id'
    ];

    public function genres() {
        return $this->belongsTo(Genres::class, 'genre_id');
     }

    public function authors() {
        return $this->belongsTo(Authors::class, 'author_id');
     }
}
