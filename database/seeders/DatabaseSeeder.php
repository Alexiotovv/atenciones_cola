<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();


        DB::table('users')->insert([
            ['name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            ]
        ]);
        DB::table('users')->insert([
            ['name' => 'Med. Fabricio',
            'email' => 'medico@gmail.com',
            'role' => 1,
            'password' => Hash::make('med123'),
            ]
        ]);
        DB::table('pantallas')->insert([
            ['recurso' => 'https://www.youtube.com/watch?v=IPL5doKZdCI']
        ]);



    }
}
