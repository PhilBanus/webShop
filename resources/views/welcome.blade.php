@extends('layouts.app')

@section('content')
		<div class="container-fluid">
<div class="col-md-6 mx-auto mb-2">


<a href="shop/Laptops" class="card bg-light text-primary">
  <img src="{{asset('img/laptop.png')}}" class="card-img" alt="Promo">
  <div class="card-img-overlay p-4">
    
  </div>
</a>

	</div>

<div class="col-md-10 mt-4 mx-auto">

	<div class="row row-cols-1 row-cols-md-4 g-4">
		@foreach(App\Models\CategoryProduct::all() as $category)
		@if($category->items()->exists() && $category->active )
  <div class="col mt-2">
    <a href="shop/{{$category->name}}" class="card">
      <img src="{{asset('img/category/'.$category->name.'.png')}}" class="card-img-top" alt="{{$category->name}}">
      <div class="card-body">
        <h5 class="card-title text-center font-weight-bold">{{$category->name}}</h5>
      </div>
    </a>
  </div>
		@endif
 @endforeach
</div>
	

</div>
			</div>

@endsection
