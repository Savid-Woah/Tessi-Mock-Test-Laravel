<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Employee;
use App\Models\Skill;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $faker = FakerFactory::create();

        Skill::create(['name' => 'Laravel']);
        Skill::create(['name' => 'VueJS']);
        Skill::create(['name' => 'ReactJS']);

        for($i = 0; $i < 5; $i++){

            $employee = Employee::create([

                'name' => $faker->name(),
                'email' => $faker->email(),
                'phone' => $faker->phoneNumber(),
                'address' => $faker->address(),
                'position' => $faker->jobTitle(),
                'salary' => $faker->numberBetween(0, 99999)
            ]);

            $skills = Skill::inRandomOrder()->limit(2)->get();
            $employee->skills()->attach($skills);
        }
    }
}
