<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductMakesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_makes', function (Blueprint $table) {
            $table->id();
			$table->string('make');
            $table->timestamps();
        });
		
		DB::table('product_makes')->insert(
		[
			['make' => 'Apple'],
			['make' => 'Microsoft'],
			['make' => 'Dell'],
			['make' => 'Logitech'],
			['make' => 'HP'],
			['make' => 'Acer'],
			['make' => 'Lenovo'],
			['make' => 'Samsung'],
			['make' => 'Intel'],
			['make' => 'Razer'],
			['make' => 'Mevo'],
			['make' => 'Creative Labs'],
			['make' => 'Anker'],
			['make' => 'Asus'],
			['make' => 'Banus WebShop'],
			['make' => 'LG'],
			['make' => 'NEC'],
			['make' => 'TP-Link'],
			['make' => 'Killer']
		]);
		
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_makes');
    }
}
