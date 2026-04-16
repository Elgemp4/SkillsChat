<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\WebsiteSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            "name" => "Admin",
            "firstname" => "Admin",
            "lastname" => "Admin",
            "email" => "admin@exemple.com",
            "role" => "admin",
            "password" => "password"
        ]);

        User::create([
            "name" => "comp01",
            "firstname" => "Pierre",
            "lastname" => "Charlier",
            "email" => "comp01@exemple.com",
            "role" => "user",
            "password" => "password"
        ]);

        User::create([
            "name" => "comp02",
            "firstname" => "Emilien",
            "lastname" => "Marquegnies",
            "email" => "comp02@exemple.com",
            "role" => "user",
            "password" => "password"
        ]);

        WebsiteSetting::create([
            "api_url" => "https://openrouter.ai/api/v1/chat/completions",
            "token_mode" => "chars",
            "api_settings" => ""
        ]);
    }
}
