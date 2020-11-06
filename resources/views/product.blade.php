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
							  <li class="breadcrumb-item" aria-current="page"><a href="{{Route('products')}}/Products">{{$product}}</a></li>
							  <li class="breadcrumb-item active" aria-current="page">{{$item->name}}</li>
						  </ol>
						
					@else
						
						  <ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{Route('products')}}/Products">Products</a></li>
							  <li class="breadcrumb-item" aria-current="page"><a href="{{Route('products')}}/{{$product}}">{{$product}}</a></li>
							<li class="breadcrumb-item active" aria-current="page">{{$item->name}}</li>
						  </ol>
						
					@endif
					</nav>
				

                <div class="card-body ">
					
					<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="{{asset('productImages/'.$item->img)}}" class="w-100" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body positon-relative">
        <h5 class="card-title">{{$item->name}}</h5>

        <p class="card-text"><small class="text-muted">{{$item->make()->first()->make}}</small></p>
		  
		  <h4 class="card-text font-weight-bold">£{{number_format($item->price,2)}}</h4>
		      <a href="{{Route('addToCart')}}?id={{$item->id}}" class="btn btn-transparent position-absolute bottom-0  mb-2 link-success"><i class="fad fa-4x fa-cart-plus"></i></a>

      </div>
    </div>
  </div>
</div>
					
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
