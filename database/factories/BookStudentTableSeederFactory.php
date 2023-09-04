<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BookStudentTableSeederFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_id' => Student::inRandomOrder()->first()->id,
            'book_id' => Book::inRandomOrder()->first()->id,
            'delivery_date' => $this->faker->dateTimeBetween(),
            'loan_date' => $this->faker->dateTimeBetween()
        ];
    }
}
