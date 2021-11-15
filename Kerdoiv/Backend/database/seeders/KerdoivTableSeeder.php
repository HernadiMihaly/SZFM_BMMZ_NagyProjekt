<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\Kerdoiv;
/** @var \Illuminate\Database\Eloquent\Factory $factory */

class KerdoivTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 5; $i++) {
            Kerdoiv::create([
                'title' => $faker->sentence,
				'is_separated' => $faker->boolean,
				'is_randomised' => $faker->boolean
            ])->each(function ($kerdoiv) {
				$kerdesek = \App\Models\Kerdes::factory()->count(10)->create();
				$kerdesek->each(function ($kerdes){
					$kerdes->kerdoiv_id = NULL;
				});
				$kerdoiv->kerdesek()->saveMany($kerdesek);
			});
        }
    }
}
