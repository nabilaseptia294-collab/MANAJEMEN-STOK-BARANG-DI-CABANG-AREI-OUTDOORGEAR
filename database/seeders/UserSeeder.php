<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Amalina Admin', // Tambahkan nama jika field ini wajib
            'email' => 'Amalina@adminarei.com',
            'password' => Hash::make('12345'),
        ]);
    }
}