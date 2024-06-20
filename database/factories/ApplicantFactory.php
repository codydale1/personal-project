<?php

namespace Database\Factories;

use App\Models\Applicant;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class ApplicantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $birthday = Carbon::now()->subYears(random_int(21, 50))->subDays(random_int(0, 364));
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'salary' => $this->faker->numberBetween(20000, 80000),
            'address' => $this->faker->address,
            'birthday' => $birthday->format('Y-m-d'), 
            'category' => $this->faker->randomElement(Applicant::$category),
            'experience' => $this->faker->randomElement(Applicant::$experience),
            'status' => $this->faker->randomElement(Applicant::$status),
        ];
    }
}
