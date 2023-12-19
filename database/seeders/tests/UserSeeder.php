<?php

namespace Database\Seeders\Tests;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
 
class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Tester '.Str::random(6),
            'email' => 'tester@email.com',
            'password' => bcrypt('123456'),
            'created_at' => Carbon::now(),
        ]);
        
    }
}
