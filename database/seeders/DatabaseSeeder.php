<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([PublisherSeeder::class]);

        $this->call([StudentsTableSeeder::class]);

        $this->call([UserTableSeeder::class]);

        $this->call([AuthorsTableSeeder::class]);

        $this->call([BooksTableSeeder::class]);
    }
}
