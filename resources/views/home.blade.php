@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
		<div class="col-md-3">
		<div class="card">
			<div class="card-body">
				<ul class="list-unstyled mb-0 py-3 pt-md-1">
			 <li class="mb-1">
				 @if($product == "Products")
      <a href="./Products" class="d-inline-flex align-items-center font-weight-bold link-dark" >
		  @else
      <a href="./Products" class="d-inline-flex align-items-center rounded" >
		  @endif
        Products
      </a>

        <ul class="list-unstyled font-weight-normal pb-1 pl-3">
			@foreach(App\Models\CategoryProduct::all() as $category)
			@if($product == $category->name)
            <li><a href="./{{$category->name}}" class="d-inline-flex align-items-center rounded font-weight-bold link-dark">{{$category->name}}</a></li>
			@else
            <li><a href="./{{$category->name}}" class="d-inline-flex align-items-center rounded  link-secondary">{{$category->name}}</a></li>
			@endif
          	@endforeach
        </ul>
    
    </li>
					</ul>
				
	
				
			</div>
			</div>
		</div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$product}} <i class="fas fa-plus ml-2 link-success" data-toggle="modal" data-target="#addItemModal"></i></div>

                <div class="card-body">
					<div class="row row-cols-1 row-cols-md-4 g-4 pt-2">
                    @if ($product == 'Products')
                        @foreach(App\Models\CategoryProduct::all() as $category)
  <div class="col mt-2">
    <a href="./{{$category->name}}" class="card">
      <img src="{{asset('img/category/'.$category->name.'.png')}}" class="card-img-top" alt="{{$category->name}}">
      <div class="card-body">
        <h5 class="card-title text-center font-weight-bold">{{$category->name}}</h5>
      </div>
    </a>
  </div>
 @endforeach
					@else
						@if(App\Models\CategoryProduct::where('Name',$product)->first()->items)
						 @foreach(App\Models\CategoryProduct::where('Name',$product)->first()->items as $Item)
  <div class="col mt-2">
    <a href="{{$product}}/{{$Item->id}}" class="card">
      <img src="{{asset('productImages/'.$Item->img)}}" class="card-img-top" alt="{{$Item->name}}">
      <div class="card-body">
        <h5 class="card-title text-center font-weight-bold">{{$Item->name}}</h5>
        <h5 class="card-title text-center font-weight-bold">£{{$Item->price}}</h5>
      </div>
    </a>
  </div>
 @endforeach
						@endif
					
                    @endif
						
				
					</div>
                   
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="addItemModal" tabindex="-1" aria-labelledby="addItemModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
		<form action="./{{$product}}/productsAddItem" method="post" enctype="multipart/form-data" >
			@csrf
      <div class="modal-header">
        <h5 class="modal-title" id="addItemModalLabel">Add a new {{substr($product,0,-1)}}</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="itemLoader">
        
		   <div class="mb-3">
    <label for="name" class="form-label">{{substr($product,0,-1)}} Name</label>
    <input type="text" class="form-control" id="name" name="name">

  </div>
		   <div class="mb-3">
    <label for="make" class="form-label">{{substr($product,0,-1)}} Make</label>
    <select class="form-select" name="make" aria-label="Default select example">
  <option selected disabled>Please Select</option>
		@foreach(App\Models\ProductMake::all() as $make)
  <option value="{{$make->id}}">{{$make->make}}</option>
		@endforeach

</select>

  </div>
		  
		  <div class="mb-3">
		  <label for="make" class="form-label">Price</label>
		  
		  <div class="input-group mb-3">
			  
  <span class="input-group-text" id="basic-addon1">£</span>
  <input type="number" step="0.01" name="price" class="form-control" placeholder="00.00" aria-label="00.00" aria-describedby="basic-addon1">
</div>
			  </div>
		  
		  <div class="form-file">
  <input type="file" class="form-file-input" id="productimage" name="productimage" accept="image/*">
  <label class="form-file-label" for="productimage">
    <span class="form-file-text">Choose image...</span>
    <span class="form-file-button">Browse</span>
  </label>
</div>
		  
		  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
			</form>
    </div>
  </div>
</div>



@endsection
