<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/migrate',function(){
	Artisan::call('migrate');
	return redirect('/');
});
Route::get('/artisanLinks',function(){
	Artisan::call('storage:link', [] );
	return redirect('/');
});

Route::get('/shop/{category?}',function ($product = 'Products'){
	return view('products',['product' => $product]);
})->name('products');

Route::get('/shop/{category}/{id?}',function ($product,$id){
	
	$item = App\Models\Product::where('id',$id)->first();
	
	return view('product',['product' => $product,'item' => $item]);
});

Route::get('/basket',function (){
	return view('basket');
})->name('basket');


Auth::routes();

Route::get('/admin/{category?}', [App\Http\Controllers\HomeController::class, 'index'])->name('admin');

Route::get('/addToCart', [App\Http\Controllers\Products::class, 'addToCart'])->name('addToCart');
Route::post('/updateBasket', [App\Http\Controllers\Products::class, 'updateBasket']);

Route::post('admin/{category}/productsAddItem',[App\Http\Controllers\Products::class, 'addProduct']);

Route::get('admin/{category}/{id?}',[App\Http\Controllers\Products::class, 'viewProduct']);
