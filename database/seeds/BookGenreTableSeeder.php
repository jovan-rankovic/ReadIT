<?php

use App\BookGenre;
use Illuminate\Database\Seeder;

class BookGenreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(BookGenre::class, 5)->create();
    }
}
