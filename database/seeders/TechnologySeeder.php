<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str; // <- da importare


class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologies = ['front-end', 'back-end'];

        foreach ($technologies as $technology) {
            $newTechnology = new Technology();
            $newTechnology->name = $technology;
            $newTechnology->slug = Str::slug($technology, '-');
            $newTechnology->save();
        }
    }
}
