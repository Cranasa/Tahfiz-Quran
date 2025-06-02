<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
          [
            'name' => 'Nama Admin',
            'email' => 'admin@gmail.com',
            'password' => 'password',
          ],
          [
            'name' => 'Nama Customer',
            'email' => 'customer@gmail.com',
            'password' => 'password',
          ],
        ])->each(fn($q) => User::create($q));
    }
}
