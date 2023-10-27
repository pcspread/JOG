<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// DB読込
use Illuminate\Support\Facades\DB;
// Hash読込
use Illuminate\Support\Facades\Hash;
// Carbon読込
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 3; $i++) {
            DB::table('users')->insert([
                'email' => "test{$i}@test.com",
                'password' => Hash::make('test1111'),
                'company' => 1,
                'email_verified_at' => Carbon::now()->__toString(),
                'remember_token' => Hash::make(bin2hex(random_bytes(32))),
                'created_at' => Carbon::now()->__toString(),
                'updated_at' => Carbon::now()->__toString(),
            ]);
        }
    }
}
