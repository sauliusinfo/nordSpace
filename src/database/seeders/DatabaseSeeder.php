<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use Monolog\Handler\RollbarHandler;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = Faker::create('lt_LT');
        $countryCode = 'LT';

        DB::table('users')->insert(
            [
                'name' => 'SauliusIT',
                'email' => 'saulius.info@icloud.com',
                'password' => Hash::make('Test12345'),
                'role' => 100,
            ]
        );

        // foreach (range(1, 200) as $_) {
        //     DB::table('accounts')->insert([
        //         'account_no' => $faker->iban($countryCode),
        //         'client_id' => $faker->numberBetween(1, 20)
        //     ]);
        // }
    }
}
