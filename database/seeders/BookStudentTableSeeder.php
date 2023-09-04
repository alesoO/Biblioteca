<?php

namespace Database\Seeders;

use App\Models\Book_Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookStudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book_Student::factory(10)->create();
    }
}
