<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Storage::deleteDirectory('posts');
        Storage::makeDirectory('posts');
        $this->call(RoleSeeder::class);
        $this->call(CarreraSeeder::class);
        $this->call(UserSeeder::class);
    }
}
