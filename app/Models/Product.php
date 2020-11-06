<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   
	public function category(){
		 return $this->belongsTo("App\Models\CategoryProduct", "id", "category_id");
	}
	
	public function make(){
		 return $this->belongsTo("App\Models\ProductMake", "make_id", "id");
	}
	
	
}
