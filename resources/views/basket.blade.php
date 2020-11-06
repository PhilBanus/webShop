@extends('layouts.app')

@section('content')


<div class="container-fluid">
    <div class="row justify-content-center">
		
		<div class="col-md-8">
			<div class="card">
				
				  <nav aria-label="breadcrumb">
				
						
						  <ol class="breadcrumb">
							  <li class="breadcrumb-item" aria-current="page"><a href="{{Route('products')}}/Products">Go Back</a></li>
				
						  </ol>
						
					
					</nav>
				
				@php $cost = 0; @endphp
			<div class="list-group">
	@if(session('cart') && session('cart') > 0 )
		@foreach(session('cart') as $cart)
					
  <div href="#" class="list-group-item list-group-item-action" aria-current="true">
	  
	  
	  
	  
    <div class="row">
		<div class="float-left col-4 col-sm-2 col-md-1">
		<img src="{{asset('productImages/'.$cart['img'])}}" class="img-thumbnail  w-100" alt="{{$cart['name']}}">
			</div>
      <h5 class="mt-3 text-left col-4 col-sm-5 col-md-7">{{$cart['name']}} <br><small>{{$cart['make']}}</small></h5>
      <div class="col-2 col-sm-2 col-md-2 text-center">
		  <small>Cost: £{{number_format($cart['price'],2)}}</small><br>
		<strong>Total: £{{number_format($cart['price']*$cart['qty'],2)}} </strong></div>
      <div class="col-2 col-sm-1 col-md-2">
		<input type="number" class="form-control qty" data-id="{{$cart['id']}}" step="1" min="0" value="{{$cart['qty']}}"></div>
    </div>

  </div>

			

     
		@php $cost += $cart['price']*$cart['qty']; @endphp
		@endforeach
				
					<div class="text-right"><button class="btn btn-warning m-2" id="update"><i class="fad fa-retweet-alt"></i> Update Basket</button></div>
				@else
				<h4 class="text-center p-4">No Items in your Basket!</h4>
				@php $disabled = "disabled" @endphp
				@endif
</div>
				<div class="card-footer text-right">
		<h4>Total Cost: <strong>£{{number_format($cost,2)}}</strong></h4>
					
				<button class="btn btn-lg btn-success {{$disabled ?? ''}}"><i class="fad fa-shopping-cart"></i> Check Out Now!</button>
			</div>
			</div>
			</div>
	</div>
	</div>

<script>
$('#update').on('click',function(){
 
	var cart = []
	
	$('.qty').each(function(){
		var id = $(this).data('id');
		var val = $(this).val();
		
		cart.push({id:id,val:val})
		
	})
	$.post('updateBasket', {"_token": "{{ csrf_token() }}", cart:cart}).done(function(){
		location.reload()
	})

	
})

</script>

@endsection
