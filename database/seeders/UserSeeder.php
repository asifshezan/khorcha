<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Asif Ahamed',
            'phone' => Str::random(11),
            'email' => 'asifahamed@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 5,
            'created_at' => Carbon::now()-> toDateTimeString(),
        ]);
    }
}
