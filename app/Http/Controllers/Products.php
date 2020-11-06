<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\CategoryProduct;
use Route;
use Session;

class Products extends Controller
{
    //

	public function addProduct($product,Request $request){
		
		if($product != "Products"){
		
		$category = CategoryProduct::where('name',$product)->first()->id;
		
		$request->productimage->storeAs('',$request->name.'.'.$request->productimage->extension(),'productImages');
		
		Product::updateorinsert(
		['name' => $request->name, 'category_id' => $category],
		['make_id' => $request->make, 'price' => $request->price, 'img' => $request->name.'.'.$request->productimage->extension() ]
		);
			
		}else{
			
		}
		
		 return redirect('./admin/'.$product);
		
	}
	
	
	public function viewProduct($product, $id){
		return $id;
	}
	
	public function addToCart(Request $request){
	
	$id = $request->id;
	$product = Product::where('id',$request->id)->first();
    $cart = Session::get('cart');
		if(is_null($cart))
			$preqty = 0;
	elseif(array_key_exists($id,$cart))
		$preqty = $cart[$id]['qty'];
	else
		$preqty = 0;
	
    $cart[$product->id] = array(
        "id" => $product->id,
        "name" => $product->name,
        "price" => $product->price,
        "img" => $product->img,
        "make" => $product->make()->first()->make,
        "qty" =>  $preqty += 1,
    );

    Session::put('cart', $cart);
    
		toastr()->success($product->name.' added to basket!');

    return redirect()->back();
	}
	
	public function updateBasket(Request $request)
{
    $cart = Session::get('cart');
	$basket = $request->cart;
    foreach ($basket as $id) 
    {
       var_dump($id);
		 if ($id['val'] > 0) {
            $cart[$id['id']]['qty'] = $id['val'];
        } else {
			 toastr()->error($cart[$id['id']]['name'].' removed!');
            unset($cart[$id['id']]);
			 
        }
    }
	toastr()->warning('Basket updated!');
    Session::put('cart', $cart);
	return Route('basket');
   
}
	
}
