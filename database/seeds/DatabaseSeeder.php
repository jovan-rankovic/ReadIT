<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(BookTableSeeder::class);
        $this->call(GenreTableSeeder::class);
        $this->call(BookGenreTableSeeder::class);

        Model::reguard();
    }
}
