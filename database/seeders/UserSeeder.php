<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'     => 'Nico Dwi Novianto',
            'email'    => 'nicogantenk@gmail.com',
            'username' => 'nicoAjaa',
            'password' => Hash::make('password') // Menggunakan Hash::make() untuk mengenkripsi kata sandi
        ]);
    }
}
