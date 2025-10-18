<?php

namespace Database\Seeders;

use App\Models\Books;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Books::create([
           'title'=> 'Cinta Segi Empat',
            'description'=> 'Cinta berEMpat',
            'price'=> '20000',
            'stok'=> '5',
            'cover_photo'=> 'CSE.jpg',
            'genre_id'=> '5',
            'author_id'=> '2'
        ]);

        Books::create([
            'title'=>'Lucunyaa',
            'description'=>'Lucu sekali',
            'price'=>'25000',
            'stok'=>'10',
            'cover_photo'=>'L.jpg',
            'genre_id'=>'1',
            'author_id'=>'3'
        ]);

        Books::create([
            'title'=>'Ibunda',
            'description'=>'Seorang ibu',
            'price'=>'20000',
            'stok'=>'15',
            'cover_photo'=>'I.jpg',
            'genre_id'=>'3',
            'author_id'=>'1'
        ]);

        Books::create([
            'title'=>'Jerit Malam',
            'description'=>'Kisah horor',
            'price'=>'20000',
            'stok'=>'15',
            'cover_photo'=>'JM.jpg',
            'genre_id'=>'2',
            'author_id'=>'4'
        ]);

        Books::create([
            'title'=>'Di balik topeng',
            'description'=>'Si misterius',
            'price'=>'25000',
            'stok'=>'10',
            'cover_photo'=>'DBT.jpg',
            'genre_id'=> '2',
            'author_id'=> '5'
        ]);
    }
}
