<?php

use Illuminate\Database\Seeder;

class CatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        echo "hello!\n\r";
        var_dump([1,2,2,3,4]);

        for ($i=0; $i < 10; $i++) { 
        	# code...
	        DB::table('menus')->insert([
	            'name' => Str::random(100),
	            'url' => Str::random(100),
	            'parent_id' => 0,
	            'code' => Str::random(100)
	       ]);

        DB::table('leds')->insert([
	            'name' => Str::random(100),
	            'description' => Str::random(1000),
	       ]);
        }


           // $table->string('name')->nullable();
           //  $table->string('code')->nullable();
           //  $table->string('url')->nullable();
           //  $table->bigInteger('parent_id')->nullable();
           //  $table->smallInteger('position')->nullable();

    }
}
