<link href="{{ asset('public/frontEnd/contactus/css/style.css')}}" rel="stylesheet" type="text/css" media="all" /><!-- style.css -->

<div class="post-ad-form">
	<div class="personal-details">
	@if(empty(Auth::user() ))
		{!! Form::Open(['url'=>'/user.comment','method'=>'POST']) !!}
			<label>Your Name <span>*</span></label>
			<input type="hidden" name="productId" value="{{ $singelProduct->id }}" >
			<input type="text" class="name" name="name" placeholder="">
			<div class="clearfix"></div>

			<label>Email Address<span>*</span></label>
			<input type="text" class="email" name="email" placeholder="">
			<div class="clearfix"></div>

			<label>Mobile No. <span>*</span></label>
			<input type="text" class="phone" name="phone" placeholder="">
			<div class="clearfix"></div>

			<label style="margin-top:-10px;">Comment<span>*</span></label>
			<textarea name="comment" rows="4"></textarea>
			<div class="clearfix"></div>

		<input type="submit" value="Comment">					
		<div class="clearfix"></div>
		{!!Form::close()!!}
	@else
		{!! Form::Open(['url'=>'/user.comment','method'=>'POST']) !!}
			<input type="hidden" name="productId" value="{{ $singelProduct->id }}" >
			<input type="hidden" name="userId" value="$userId">
			<label>Comment<span>*</span></label>
				<textarea name="comment" rows="4"></textarea>>
				<div class="clearfix"></div>

			<input type="submit" value="Comment">					
			<div class="clearfix"></div>
		{!!Form::close()!!}
	@endif
	</div>
</div>
