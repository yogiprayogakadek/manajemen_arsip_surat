<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
            'nama' => 'Admin',
            'telp' => '082237188923',
            'username' => 'admin',
            'password' => bcrypt('12345678'),
            'role' => 'Admin',
            // 'role_id' => $role->id,
            'foto' => 'assets/uploads/media/users/default.png',
        ]);
    }
}
