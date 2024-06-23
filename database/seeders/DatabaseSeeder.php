<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'firstname' => 'Ed Diamond',
            'lastname' => 'Ed Diamond',
            'email' => 'leads4life@cavemanleads.com',
            'password' => Hash::make('H@(!!0$\$_$/$2o0o)'),
            'type' => 1,
            'username' => 'Ed-D1amond',
            'parent_id' => null
        ]);
    }
}
