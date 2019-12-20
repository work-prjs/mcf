<?php

use Illuminate\Database\Seeder;
use App\Models\Menu;
use Faker\Generator as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


	// $factory->define(Menu::class, function (Faker $faker) {

	//     return [
	//         'created_at' => $faker->date('Y-m-d H:i:s'),
	//         'updated_at' => $faker->date('Y-m-d H:i:s'),
	//         'title' => $faker->word, 
	//         'code' => $faker->word,
	//         'url' => $faker->word
	//     ];
	// });

        // $this->call(UsersTableSeeder::class);
        $this->call(CatsTableSeeder::class);
        // factory(App\Models\Menu::class, 10)->create();

        
    }
}
