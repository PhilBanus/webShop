@extends('layouts.app')

@section('content')


<div class="container-fluid">
    <div class="row justify-content-between">
		<div class="col-md-3">
		<div class="card">
			<div class="card-body">
				<ul class="list-unstyled mb-0 py-3 pt-md-1">
			 <li class="mb-1">
				 @if($product == "Products")
      <a href="{{Route('products')}}/Products" class="d-inline-flex align-items-center font-weight-bold link-dark" >
		  @else
      <a href="{{Route('products')}}/Products" class="d-inline-flex align-items-center rounded" >
		  @endif
        Products
      </a>

        <ul class="list-unstyled font-weight-normal pb-1 pl-3">
			@foreach(App\Models\CategoryProduct::all() as $category)
			@if($category->items()->exists() && $category->active )
			@if($product == $category->name)
            <li><a href="{{Route('products')}}/{{$category->name}}" class="d-inline-flex align-items-center rounded font-weight-bold link-dark">{{$category->name}}</a></li>
			@else
            <li><a href="{{Route('products')}}/{{$category->name}}" class="d-inline-flex align-items-center rounded  link-secondary">{{$category->name}}</a></li>
			@endif
			@endif
          	@endforeach
        </ul>
    
    </li>
					</ul>
				
		
			</div>
			</div>
		</div>
        <div class="col-md-9">
            <div class="card">
                <nav aria-label="breadcrumb">
					@if($product == "Products")
						
						  <ol class="breadcrumb">
							<li class="breadcrumb-item active" aria-current="page">{{$product}}</li>
						  </ol>
						
					@else
						
						  <ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{Route('products')}}/Products">Products</a></li>
							<li class="breadcrumb-item active" aria-current="page">{{$product}}</li>
						  </ol>
						
					@endif
					</nav>
				

                <div class="card-body ">
                <div class="row row-cols-1 row-cols-sm-3 row-cols-md-6 g-4 pt-3"> 
			@if($product == "Products")
			@php $products = App\Models\Product::all(); @endphp
			@else
			@php $products = App\Models\CategoryProduct::all()->where('name', $product)->first()->items; @endphp
					@endif
					@foreach( $products as $item)
					
  <div class="col mt-2">
	 
    <a href="{{Route('products')}}/{{$product}}/{{$item->id}}" class="text-decoration-none"><div class="card bg-light position-relative overflow-hidden">
		 <price class="corner-ribbon top-right blue">£{{number_format($item->price,2)}}</price>
		@if($sale ?? false)
		 <sale class="corner-ribbon top-left red">£500</sale>
		@endif
      <img src="{{asset('productImages/'.$item->img)}}" class="card-img-top" alt="{{$item->name}}">
      <div class="card-body">
        <h5 class="card-title">{{$item->name}}</h5>
    <p class="card-text">{{$item->make()->first()->make}}</p>
    <a href="{{Route('addToCart')}}?id={{$item->id}}" class="btn btn-transparent position-absolute bottom-0 right-0 m-2 link-success"><i class="fad fa-2x fa-cart-plus"></i></a>
      </div>
	  </div></a>
  </div>
 @endforeach
					</div>
					
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
