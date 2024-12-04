<?php

namespace Database\Seeders;

use App\Models\Setting;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Setting::create([
            'name' => 'Escudo',
            'slug' => 'escudo',
            'is_file' => true,
            'value' => null,
        ]);

        Setting::create([
            'name' => 'Bandera',
            'slug' => 'bandera',
            'is_file' => true,
            'value' => null,
        ]);

        Setting::create([
            'name' => 'Misión',
            'slug' => 'mision',
            'is_file' => false,
            'value' => null,
        ]);

        Setting::create([
            'name' => 'Visión',
            'slug' => 'vision',
            'is_file' => false,
            'value' => null,
        ]);

        Setting::create([
            'name' => 'Himno',
            'slug' => 'himno',
            'is_file' => false,
            'value' => null,
        ]);
    }
}
