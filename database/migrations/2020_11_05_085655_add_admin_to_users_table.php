<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdminToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
			$table->boolean('admin')->default(0);
        });
		
		DB::table('users')->insert([
		['name' => 'admin', 'email' => 'admin@banuswebshop.com', 'password' => Hash::make('admin'), 'admin' => true ],
		['name' => 'test', 'email' => 'test@banuswebshop.com', 'password' => Hash::make('test'), 'admin' => false ]
		]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
			
        });
    }
}
