<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TableUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
 
        DB::table('users')->insert([
            'fullname' => Str::random(10),
            'role_id' => 1,
            'email' => Str::random(10).'@gmail.com',
            'instance' => Str::random(10),
            'password' => Hash::make('password'),
        ]);
    }
}
