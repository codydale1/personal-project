<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Applicant;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'Dale Nacaario',
            'email' => 'dalenacario@gmail.com',
        ]);
        User::factory(200)->create();

        $users = User::all()->shuffle();
        for ($i = 0; $i < 100; $i++){
            Applicant::factory()->create([
                'user_id' =>$users->pop()->id

            ]);
        }

        // $employers = Employer::all();
        // for ($i = 0; $i < 20; $i++){
        //     \App\Models\Job::factory()->create([
        //         'employer_id' => $employers->random()->id
        //     ]);
        // }

        // foreach ($users as $user){
        //     $jobs = \App\Models\Job::inRandomOrder()->take(rand(0,4))->get();

        //     foreach ($jobs as $job){
        //         \App\Models\JobApplication::factory()->create([
        //             'job_id' => $job->id,
        //             'user_id' => $user->id
        //         ]);
        //     }

        // }


    }
}
