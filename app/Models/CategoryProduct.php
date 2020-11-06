<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
   
	
	
	public function items()
	{
		return $this->hasMany('App\Models\Product','category_id','id');
	}
	
}
