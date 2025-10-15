<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Genres extends Model
{
    private $genres = [
        [
            'name' => 'Komedi',
            'description' => 'Lucu'
        ],
        [
            'name' => 'Horor',
            'description' => 'Seram'
        ],
        [
            'name' => 'Sad',
            'description' => 'Sedih'
        ],
        [
            'name' => 'Happy',
            'description' => 'Senang'
        ],
        [
            'name' => 'Romantis',
            'description' => 'Percintaan'
        ]
    ]; 
    public function getGenres() {
        return $this->genres;
    }
}
