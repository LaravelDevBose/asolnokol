@extends('frontEnd.master')

@section('title')
Product | Aslol Vs Nokol
@endsection
 
@section('mainContent')

<!--//singel view-->
<div class="single w3ls">
	<div class="container">
		<div class="col-md-8 single-left">
<!-- Real Product Information start -->

<!-- Real Product Slider start -->
			<div class="sample1">
				<div class="carousel" style="height: 300px;">
					<ul><?php $i=1; ?>
					@foreach( $productImages as $productImage )
					<?php if($i== '1'){ ?>
						<li class="current">
							<img style="height:300px;" src="{{ asset( $productImage->imagePath )}}" alt=""> 
							<div class="caption1"><span>doloribus asperio rep</span></div>
						</li>
					<?php }else{ ?>
						<li> 
							<img style="height:300px;" src="{{ asset( $productImage->imagePath )}}" alt=""> 
							<div class="caption"><span>maiores alias consequ</span></div>
						</li>
					<?php } $i++;?>
					@endforeach
					</ul>
					<div class="controls">
						<div class="prev"></div>
						<div class="next"></div>
					</div>
				</div>
				<div class="thumbnails">
					<ul>
					<?php $i=1; ?>
					@foreach( $productImages as $productImage )
					<?php  if($i== '1'){ ?>
						<li class="selected"> <div><img style="height:70px;" src="{{ asset( $productImage->imagePath )}}" alt=" "></div> </li>
					<?php }else{ ?>
						<li> <div><img style="height:70px;" src="{{ asset( $productImage->imagePath )}}" alt=" "></div> </li>
					<?php } $i++;?>
					@endforeach
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
<!-- Real Product Slider End -->
<!-- Real Product Details End -->

			<div class="single-left2">
				<h2 style="color:#E16B5B; margin-top: 15px; margin-bottom: 10px; "><i>{!! $singelProduct->productName !!}</i></h2>
				<ul class="com">
					<li><span class="glyphicon glyphicon-user" aria-hidden="true"></span><a href="#">Admin</a></li>
					<li><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span><a href="#">{{ count($reviews)}} Reviews</a></li>
					<li>
						<a href="{{ url('product.like/'. $singelProduct->id ) }}"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span></a>@if(empty($likes))<?php echo 0;?>@else{{ $likes->totalLikes }}@endif Likes
					</li>
				</ul>
			</div>
			<div class="clearfix"> </div>
			<div class="single-left3" style="margin:20px 0;">
				<p>{!! $singelProduct->identify !!}</p>
			</div>
			<div class="clearfix"> </div>
			<div class="single-left3" style="padding:20px 0; ">
				<p>{!! $singelProduct->longDescription !!}</p>
			</div>
			<div class="clearfix"> </div>
<!-- Real Product Detils End -->
<!-- Real Product Information End -->

<!-- Fack Product Information start -->
<!-- Fack Product Slider start -->
			<div class="sample1">
				<div class="carousel" style="height: 341px;">
					<ul><?php $i=1; ?>
					@foreach( $fackproductImages as $fackproductImage )
					<?php if($i== '1'){ ?>
						<li class="current">
							<img style="height:300px;" src="{{ asset( $fackproductImage->fackProductImagePath )}}" alt=""> 
							<div class="caption1"><span>doloribus asperio rep</span></div>
						</li>
					<?php }else{ ?>
						<li> 
							<img style="height:300px;" src="{{ asset( $fackproductImage->fackProductImagePath )}}" alt=""> 
							<div class="caption"><span>maiores alias consequ</span></div>
						</li>
					<?php } $i++;?>
					@endforeach
					</ul>
					<div class="controls">
						<div class="prev"></div>
						<div class="next"></div>
					</div>
				</div>
				<div class="thumbnails">
					<ul>
					<?php $i=1; ?>
					@foreach( $fackproductImages as $fackproductImage )
					<?php  if($i== '1'){ ?>
						<li class="selected"> <div><img style="height:70px;" src="{{ asset( $fackproductImage->fackProductImagePath )}}" alt=" "></div> </li>
					<?php }else{ ?>
						<li> <div><img style="height:70px;" src="{{ asset( $fackproductImage->fackProductImagePath )}}" alt=" "></div> </li>
					<?php } $i++;?>
					@endforeach
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="clearfix"> </div>
<!-- Fack Product Slider End -->
<!-- Fack Product Detils Start -->
			<div class="single-left3" style="padding:20px 0; ">
				<p>{!! $singelProduct->fackProductLongDescription !!}</p>
			</div>
			<div class="clearfix"> </div>

<!-- Fack Product Detils End -->
<!-- Fack Product Information End -->
			<!-- <div class="single-left4">
				<h4>Share This Post</h4>
				<ul class="social-icons social-icons1">
					<li><a href="#" class="icon icon-border icon-border1 facebook"></a></li>
					<li><a href="#" class="icon icon-border icon-border1 twitter"></a></li>
					<li><a href="#" class="icon icon-border icon-border1 instagram"></a></li>
					<li><a href="#" class="icon icon-border icon-border1 pinterest"></a></li>
				</ul>
			</div> -->
			<!-- comment Start -->
			<div class="comments agile-info">
				<h4>Reviews</h4>
			@if (count($reviews) != 0)
				@foreach($reviews as $review)
					<div class="comments-grid" style="margin:15px 0;">
						
						<div class="comments-grid-right">
							<h3><a href="#">{{ $review->name}}</a></h3>
							<?php 
			                 	$date = new DateTime($review->created_at);
			                 	$commentDate = date_format($date, 'd F Y');
		                  	?>
							<h5><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>{{ $commentDate }}</h5>
							<p>{{ $review->review }}</p>
							
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="clearfix"> </div>
				@endforeach
			@endif
			</div>
			@include('frontEnd.socialmedia.facebookCommentPlagin')
<!-- Comment End -->
			<h2 style=" margin-bottom: 0px;" class="w3-head text-center">Enter Your Comment</h2>
			

		@include('frontEnd.viewProducts.productComment')
		</div>

		<div class="col-md-4 single-right">
			@include('frontEnd.includes.sidebar')
		</div>
		<div class="clearfix"> </div>

	</div>
</div>
<!-- //singel view -->

<script src="{{ asset('public/frontEnd/js/jquery.light-carousel.js')}}"></script> 
<script>
	$('.sample1').lightCarousel();
</script> 
<link href="{{ asset('public/frontEnd/css/light-carousel.css')}}" rel="stylesheet" type="text/css">




@endsection
