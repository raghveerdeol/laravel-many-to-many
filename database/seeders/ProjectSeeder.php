<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $types = Type::all()->pluck('id');
        for ($i=0; $i < 100; $i++) {
            $newProject = new Project();
            $newProject->type_id = $faker->randomElement($types);
            $newProject->title = $faker->realText(30);
            $newProject->language = $faker->word(4);
            $newProject->content = $faker->realText(400);
            $newProject->started_on = $faker->dateTimeThisMonth();
            $newProject->finished = $faker->boolean();
            $newProject->image_url = $faker->imageUrl(1920,1080, 'website');
            $newProject->website_url = $faker->url();
            $newProject->save();
        }
    }
}
