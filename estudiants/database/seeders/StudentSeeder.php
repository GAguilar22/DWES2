<?php

namespace Database\Seeders;

use App\Models\Student;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Genera 10 estudiants aleatoris en català i els insereix a la BD.
     */
    public function run(): void
    {
        $faker = Faker::create('ca_ES');

        for ($i = 0; $i < 10; $i++) {
            Student::create([
                'name' => $faker->name(),
                'email' => $faker->unique()->safeEmail(),
                'address' => $faker->address(),
            ]);
        }
    }
}
