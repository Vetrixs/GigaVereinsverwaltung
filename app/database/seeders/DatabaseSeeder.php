<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Integer;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i <= 100; $i++) {
            DB::table('members')->insert([
                'name' => Str::random(10),
                'phone_number' => 2054391235,
                'email_address' => Str::random(10) . '@gmail.com',
                'is_employed' => random_int(0, 1),
                'birthday' => Date::create(2023, random_int(0, 12), random_int(0, 28), 0, 0, 0, 2),
                'iban' => 1234567890
            ]);
        }
    }
}
