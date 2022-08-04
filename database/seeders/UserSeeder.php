<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Matías Benítez',
            'slug' => 'matias-benitez',
            'email' => 'matias@correo.com',
            'password' => bcrypt('password')
        ])->assignRole('admin');

        User::factory(9)->create();
    }
}
