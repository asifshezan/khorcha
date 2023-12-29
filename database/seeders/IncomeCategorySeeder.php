<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class IncomeCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('income_categories')->insert([
            'incate_name' => Str::random(10),
            'incate_remarks' => Str::random(10),
            'incate_creator' => 1,
            'incate_slug' => 'INC'.Str::random(10),
            'created_at' => Carbon::now()-> toDateTimeString(),
        ]);
    }
}
