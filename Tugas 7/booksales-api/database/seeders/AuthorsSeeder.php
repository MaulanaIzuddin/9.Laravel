<?php

namespace Database\Seeders;

use App\Models\Authors;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Authors::create([
            'name' => 'Steven' ,
            'photo' => 'Steven.jpg',
            'bio' => 'Author keren'
        ]);

        Authors::create([
            'name' => 'Ryuu' ,
            'photo' => 'Ryuu.jpg',
            'bio' => 'Author penyayang'
        ]);

        Authors::create([
            'name' => 'Lee' ,
            'photo' => 'Lee.jpg',
            'bio' => 'Author ceria'
        ]);

        Authors::create([
            'name' => 'Dragon' ,
            'photo' => 'Dragon.jpg',
            'bio' => 'King author'
        ]);

        Authors::create([
            'name' => 'Farya' ,
            'photo' => 'Farya.jpg',
            'bio' => 'Author extrovert'
        ]);
    }
}
