<?php

use App\Genre;
use Illuminate\Database\Seeder;

class GenreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Genre::create([
            'name' => 'Horror'
        ]);

        Genre::create([
            'name' => 'Sci-fi'
        ]);

        Genre::create([
            'name' => 'Romance'
        ]);
    }
}
