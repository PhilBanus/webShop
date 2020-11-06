<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class AddDefaultProductCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    
		
		 DB::table('category_products')->insert([
	   ['name' => 'Laptops', 'active' => 1],
	   ['name' => 'Monitors', 'active' => 1],
	   ['name' => 'Mice', 'active' => 1],
	   ['name' => 'Keyboards', 'active' => 1],
	   ['name' => 'Webcams', 'active' => 1],
	   ['name' => 'Spare Parts', 'active' => 1],
	   ['name' => 'Merch', 'active' => 1]]
	   );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       
    }
}
