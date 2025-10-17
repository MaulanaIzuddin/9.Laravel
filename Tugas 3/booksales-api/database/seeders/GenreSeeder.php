<?php

namespace Database\Seeders;

use App\Models\Genres;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Genres::create([
            'name' => 'Komedi',
            'description' => 'Lucu'
        ]);

        Genres::create([
            'name' => 'Horor',
            'description' => 'Seram'
        ]);

        Genres::create([
            'name' => 'Sad',
            'description' => 'Sedih'
        ]);

        Genres::create([
            'name' => 'Happy',
            'description' => 'Senang'
        ]);

        Genres::create([
            'name' => 'Romantis',
            'description' => 'Percintaan'
        ]);
    }
}
