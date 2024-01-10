<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $technologies = ['html','css','js','php','sql','vue','bootstrap','laravel',];

        foreach ($technologies as $technology_name) {

            $new_technology = new Technology();
            $new_technology->name = $technology_name;

            $new_technology->save();
        }
    }
}
