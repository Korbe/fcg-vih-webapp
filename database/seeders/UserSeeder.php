<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\User;
use Illuminate\Auth\Passwords\PasswordBroker;
use Illuminate\Database\Seeder;
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
        if (User::whereEmail("office@fcg-villach.at")->doesntExist()) {
            $user = User::create([
                'name' => "FCG Villach",
                'email' => "office@fcg-villach.at",
                'password' => Hash::make("password")
            ]);
        }
    }
}
