<?php

namespace Database\Seeders;

use App\Models\Genre;
use App\Models\Risk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Genre::factory(10)->create();
    }
}
