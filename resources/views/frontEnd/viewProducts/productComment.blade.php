<link href="{{ asset('public/frontEnd/contactus/css/style.css')}}" rel="stylesheet" type="text/css" media="all" /><!-- style.css -->

<div class="post-ad-form">
	<div class="personal-details">
	@if (Auth::guest())
		{!! Form::Open(['url'=>'/review/store','method'=>'POST']) !!}
			<input type="hidden" name="productId" value="{{ $singelProduct->id }}" >
			<input type="text" name="name" placeholder="Full Name">
			<input type="email" name="email" placeholder="Email Address">
			<textarea name="review" rows="4" placeholder="Your Review"></textarea>
			<div class="clearfix"></div>
			<button type="submit" class="btn btn-success pull-right">Review</button>					
			<div class="clearfix"></div>
		{!!Form::close()!!}
	@else
		<form action="{{ url('/review/store') }}" method="POST">{{ csrf_field() }}
			<input type="hidden" name="productId" value="{{ $singelProduct->id }}" >
			<input type="hidden" name="name" value="{{Auth::user()->name}}">
			<input type="hidden" name="email" value="{{Auth::user()->email}}">
			<textarea name="review" rows="4" placeholder="Your Review"></textarea>
			<div class="clearfix"></div>
			<button type="submit" class="btn btn-success pull-right">Review</button>
								
			<div class="clearfix"></div>
		{!!Form::close()!!}
	@endif
	</div>
</div>
