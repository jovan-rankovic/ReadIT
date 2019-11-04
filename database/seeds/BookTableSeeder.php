<?php

use App\Book;
use Illuminate\Database\Seeder;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::create([
            'title' => 'Harry Potter',
            'description' => 'Curabitur aliquam velit lacinia, eleifend sapien id, aliquam mauris. Nam.',
            'reserved' => true
        ]);

        Book::create([
            'title' => 'Lord of the Rings',
            'description' => 'Curabitur aliquam velit lacinia, eleifend sapien id, aliquam mauris. Nam.'
        ]);

        Book::create([
            'title' => 'Hobbit, The',
            'description' => 'Curabitur aliquam velit lacinia, eleifend sapien id, aliquam mauris. Nam.'
        ]);

        factory(Book::class, 5)->create();
    }
}
