<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str; // <- da importare


class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projects = config('project');

        foreach ($projects as $project) {
            $newProject = new Project();
            $newProject->title = $project["title"];
            $newProject->link = $project["link"];
            $newProject->cover_image = $project["cover_image"];
            $newProject->slug = Str::slug($newProject->title, '-');
            $newProject->save();
        }
    }
}
