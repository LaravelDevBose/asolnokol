@extends('frontEnd.master')

@section('title')
singel-Blog | Aslol Vs Nokol
@endsection

@section('mainContent')
<!--//singel view-->
<div class="single w3ls">
	<div class="container">
		<div class="col-md-8 single-left">
			<div class="sample1">
				<div class="carousel" style="height: 341px;">
					<ul>
					@foreach($blogImages as $blogImage)
						@if(count($blogImages)==1)
							<li class="current"> <img src="{{ asset( $blogImage->imagePath  )}}" alt="{{ $blogImage->imageName }}"> <div class="caption1"><span>doloribus asperio rep</span></div></li>
						@else
							<li class=""> <img src="{{ asset( $blogImage->imagePath  )}}" alt="{{ $blogImage->imageName }}"> <div class="caption1"><span>Itaque earum rerum hic</span></div></li>
						@endif
					@endforeach
					</ul>
					<div class="controls">
						<div class="prev"></div>
						<div class="next"></div>
					</div>
				</div>
				<div class="thumbnails">
					<ul>
					@foreach($blogImages as $blogImage)
						@if(count($blogImages)==1)
							<li class="selected"> <div><img src="{{ asset( $blogImage->imagePath  )}}" alt="{{ $blogImage->imageName }} "></div> </li>
						@else
							<li class=""> <div><img src="{{ asset( $blogImage->imagePath  )}}" alt="{{ $blogImage->imageName }} "></div> </li>
						@endif
					@endforeach
					</ul>
				</div>
			</div>
			<div class="single-left2">
				<h2 style="color:#E16B5B; margin-top: 15px; margin-bottom: 10px; "><i>{{ $singelBlog->blogTitel }}</i></h2>
				<ul class="com">
					<li><span class="glyphicon glyphicon-user" aria-hidden="true"></span><a href="#">Admin</a></li>
					<li><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span><a href="#">@if(empty($blogComments))<?php echo 0;?>@else  {{ count($blogComments) }}@endif Comments</a></li>
					<li>
						<a href="{{ url('blog.like/'. $singelBlog->id ) }}"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span></a>@if(empty($blogLikes->likes))<?php echo 0;?>@else{{ $blogLikes->likes }} @endif Likes
					</li>
				</ul>
				<div class="single-left2-sub">
					
				</div>
			</div>
			<div class="single-left3">
				{!! $singelBlog->longDescription !!}
			</div>
			<!-- <div class="single-left4">
				<h4>Share This Post</h4>
				<ul class="social-icons social-icons1">
					<li><a href="#" class="icon icon-border icon-border1 facebook"></a></li>
					<li><a href="#" class="icon icon-border icon-border1 twitter"></a></li>
					<li><a href="#" class="icon icon-border icon-border1 instagram"></a></li>
					<li><a href="#" class="icon icon-border icon-border1 pinterest"></a></li>
				</ul>
			</div> -->
			<div class="comments agile-info">
				<h3>Comments</h3>
				@foreach( $blogComments as $blogComment)
					<div class="comments-grid" style="margin:15px 0;">
						<div class="comments-grid-left">
							<!-- <img src="{{ asset('public/frontEnd/images/single.jpg')}}" alt=" " class="img-responsive"> -->
							<h3><a href="#">{{ strtoupper($blogComment->name) }}</a></h3><br/>
							<?php $date=substr($blogComment->created_at, 0, strpos( $blogComment->created_at ,' ')) ?>
							<h5><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>{{ $date }}</h5>
						</div>
						<div class="comments-grid-right">
							
							<p>{{ $blogComment->comment }}</p>
							
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="clearfix"> </div>
				@endforeach
				
			</div>

			@include('frontEnd.socialmedia.facebookCommentPlagin')
<!-- Comment End -->
			<h2 style="" class="w3-head text-center">Enter Your Comment</h2>
			
			@include('frontEnd.blog.blogComment')


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
