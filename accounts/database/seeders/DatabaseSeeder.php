<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as factory;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {



        // User::create([
        //     'name' => 'admin',
        //     'email' => 'admin@gmail.com',
        //     'password' => Hash::make(12345678),
        //     'role' => 'admin',
        //     'status' => 1,
        //     'email_verified_at' => Carbon::now(),
        // ]);

       $factory = Factory::create();
       for ($i = 1; $i <= 10; $i++) {
           User::factory()->create([
               'name' => $factory->name,
               'email' => $factory->email,
               'password' => Hash::make(12345678),
               'role' => 'doctor',
               'email_verified_at' => Carbon::now(),
           ]);
       }

        $this->call([
            SpecialitySeeder::class,
        ]);
    }
}
