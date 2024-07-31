<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $technologiesName = [
            'php',
            'javascript',
            'html',
            'css',
            'vue',
            'laravel',
            'bootstrap',
        ];

        foreach($technologiesName as $technologyName){
            $technology = new Technology();
            $technology->name = $technologyName;
            $technology->color = $faker->unique()->safeHexColor();
            $technology->save();
        }
    }
}
