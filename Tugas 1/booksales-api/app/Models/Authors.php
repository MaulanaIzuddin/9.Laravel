<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Authors extends Model
{
     private $authors = [
        [
            'name' => 'Steven',
            'photo' => 'Steven.jpg',
            'bio' => 'Author keren'
        ],
        [
            'name' => 'Ryuu',
            'photo' => 'Ryuu.jpg',
            'bio' => 'Author penyayang'
        ],
        [
            'name' => 'Lee',
            'photo' => 'Lee.jpg',
            'bio' => 'Author ceria'
        ],
        [
            'name' => 'Dragon',
            'photo' => 'Dragon.jpg',
            'bio' => 'King author'
        ],
        [
            'name' => 'Farya',
            'photo' => 'Farya.jpg',
            'bio' => 'Author extrovert'
        ]
    ]; 
    public function getAuthors() {
        return $this->authors;
    }
}
