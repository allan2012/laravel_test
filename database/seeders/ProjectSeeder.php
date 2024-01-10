<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    private array $sampleProjects = ['Candy Website', 'Weather API'];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sampleProjectCount = count($this->sampleProjects);

        for ($i =0; $i < $sampleProjectCount; $i++) {
            $project = new Project;
            $project->name = $this->sampleProjects[$i];
            $project->save();
        }
    }
}
