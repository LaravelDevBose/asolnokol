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
		@if(!empty($searchResult))
			<div class="sample1">
				<div class="carousel" style="height: 300px;">
					<ul>
					<?php 
						$i=1;  
						if(file_exists($productImage->imagePath)){
							$productImage = $productImage->imagePath;
						}else{
							$productImage = 'public/frontEnd/images/placeholder.jpg';
						}
					?>
					@foreach( $productImages as $productImage )
					<?php if($i== '1'){ ?>
						<li class="current">

							<img style="height:300px;" src="{{ asset( $productImage )}}" alt=""> 
							<div class="caption1"><span>doloribus asperio rep</span></div>
						</li>
					<?php }else{ ?>
						<li> 
							<img style="height:300px;" src="{{ asset( $productImage )}}" alt=""> 
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
					<?php 
						$i=1;  
						if(file_exists($productImage->imagePath)){
							$productImage = $productImage->imagePath;
						}else{
							$productImage = 'public/frontEnd/images/placeholder.jpg';
						}
					?>

					<?php  if($i== '1'){ ?>
						<li class="selected"> <div>
							<img style="height:70px;" src="{{ asset( $productImage )}}" alt=" "></div> 
						</li>
					<?php }else{ ?>
						<li> <div><img style="height:70px;" src="{{ asset( $productImage )}}" alt=" "></div> </li>
					<?php } $i++;?>
					@endforeach
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
<!-- Real Product Slider End -->
<!-- Real Product Details End -->

			<div class="single-left2">
				<h2 style="color:#E16B5B; margin-top: 15px; margin-bottom: 10px; "><i>{!! $searchResult->productName !!}</i></h2>
				<ul class="com">
					<li><span class="glyphicon glyphicon-user" aria-hidden="true"></span><a href="#">Admin</a></li>
					<li><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span><a href="#">{{ count($comments)}} Comments</a></li>
					<li>
						<a href="{{ url('/user.like') }}" onclick="event.preventDefault()document.getElementById('likes').submit();">
						<span class="glyphicon glyphicon-heart" aria-hidden="true"></span>@if(empty($likes))0 @else {{ $likes->totalLikes }} @endif Likes </a>

	                    <form id="likes" action="{{ url('/user.like') }}" method="POST" style="display: none;">
	                    	<input type="hidden" name="productId" value="{{ $searchResult->id }}">
	                        {{ csrf_field() }}
	                    </form>
					</li>
				</ul>
			</div>
			<div class="clearfix"> </div>
			<div class="single-left3" style="margin:20px 0;">
				<p>{!! $searchResult->identify !!}</p>
			</div>
			<div class="clearfix"> </div>
			<div class="single-left3" style="padding:20px 0; ">
				<p>{!! $searchResult->longDescription !!}</p>
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
					<?php 
						$i=1;  
						if(file_exists($fackproductImage->fackProductImagePath)){
							$fackproductImage = $fackproductImage->fackProductImagePath;
						}else{
							$fackproductImage = 'public/frontEnd/images/placeholder.jpg';
						}
					?>

					<?php if($i== '1'){ ?>
						<li class="current">
							<img style="height:300px;" src="{{ asset( $fackproductImage )}}" alt=""> 
							<div class="caption1"><span>doloribus asperio rep</span></div>
						</li>
					<?php }else{ ?>
						<li> 
							<img style="height:300px;" src="{{ asset( $fackproductImage )}}" alt=""> 
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
					<?php 
						$i=1;  
						if(file_exists($fackproductImage->fackProductImagePath)){
							$fackproductImage = $fackproductImage->fackProductImagePath;
						}else{
							$fackproductImage = 'public/frontEnd/images/placeholder.jpg';
						}
					?>
					<?php  if($i== '1'){ ?>
						<li class="selected"> <div><img style="height:70px;" src="{{ asset( $fackproductImage )}}" alt=" "></div> </li>
					<?php }else{ ?>
						<li> <div><img style="height:70px;" src="{{ asset( $fackproductImage )}}" alt=" "></div> </li>
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
				<p>{!! $searchResult->fackProductLongDescription !!}</p>
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
				<h4>Comments</h4>
			@foreach($comments as $comment)
				<div class="comments-grid" style="margin:15px 0;">
						<div class="comments-grid-left">
							<img src="{{ asset('public/frontEnd/images/single.jpg')}}" alt=" " class="img-responsive">
						</div>
						<div class="comments-grid-right">
							<h3><a href="#">{{ $comment->name}}</a></h3>
							<h5><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>{{ $comment->created_at }}</h5>
							<p>{{ $comment->comment }}</p>
							<div class="reply" >
								<a href="#" >Reply</a>
							</div>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="clearfix"> </div>
			@endforeach
			</div>
<!-- Comment End -->
			<h2 style="" class="w3-head text-center">Enter Your Comment</h2>
			<p class="text text-center" style="color:#E16B5B; margin-top: -10px;">If You Are Register User Then Login Plz OR You Can Register Now Also !</p>

		@include('frontEnd.comment.commentArea')

		@else
			<div class="alert alert-danger text-center"><h2>Sorry Sir Product Name Does Not Match </h2></div>
			<p class="text text-center text-info">For Better Result You Can use another Seraching Ber</p>
			
		
		@endif
		</div>

<!-- Left side close -->

		<div class="col-md-4 single-right">
			<div class="blo-top">
				<div class="tech-btm">
					<h4>Sign up to our newsletter</h4>
					<p>Pellentesque dui, non felis. Maecenas male</p>
						<div class="name">
							 <form action="#" method="post">
								<input type="text" name="email" class="email" placeholder="Enter your email address" required="">
								<input type="submit" value="Subscribe">
							</form>
							<div class="clearfix"> </div>
						</div>
				</div>
			</div>
			@if(!empty($searchResult))
			<div class="blo-top1">
				<div class="agileits_twitter_posts tech-btm">
					<h3>Related Product</h3>
					@foreach( $relatedProducts as $relatedProduct )
						<div class="related-post">
							<?php  
	                            $productImage=DB::table('products_images')->where('productId', $relatedProduct->id)->value('imagePath'); 
	                            if(!file_exists($productImage)){
                                    $productImage = 'public/frontEnd/images/placeholder.jpg';   	                                }
	                            }

	                        ?>
							<div class="related-post-left">
								<a href="{{ url('/singel.product/'.$relatedProduct->id ) }}"><img src="{{ asset( $productImage )}}" alt=" " class="img-responsive"></a>
							</div>
							<div class="related-post-right">
								<h4><a href="{{ url('/singel.product/'.$relatedProduct->id ) }}">{{ $relatedProduct-> productName }}</a></h4>
								<p>{{ $relatedProduct-> productName }}</p>
							</div>
							<div class="clearfix"> </div>
						</div>
					@endforeach
				</div>
			</div>
			@endif
			<div class="related-posts">
				<h3>Related Posts</h3>
				<div class="related-post">
					<div class="related-post-left">
						<a href="single.html"><img src="{{ asset('public/frontEnd/images/f1.jpg')}}" alt=" " class="img-responsive"></a>
					</div>
					<div class="related-post-right">
						<h4><a href="single.html">Donec sollicitudin</a></h4>
						<p>Aliquam dapibus tincidunt metus. 
							<span>Praesent justo dolor, lobortis.</span>
						</p>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="related-post">
					<div class="related-post-left">
						<a href="single.html"><img src="{{ asset('public/frontEnd/images/f2.jpg')}}" alt=" " class="img-responsive"></a>
					</div>
					<div class="related-post-right">
						<h4><a href="single.html">Donec sollicitudin</a></h4>
						<p>Aliquam dapibus tincidunt metus. 
							<span>Praesent justo dolor, lobortis.</span>
						</p>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="related-post">
					<div class="related-post-left">
						<a href="single.html"><img src="{{ asset('public/frontEnd/images/f3.jpg')}}" alt=" " class="img-responsive"></a>
					</div>
					<div class="related-post-right">
						<h4><a href="single.html">Donec sollicitudin</a></h4>
						<p>Aliquam dapibus tincidunt metus. 
							<span>Praesent justo dolor, lobortis.</span>
						</p>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
			<div class="popular-videos">
			    <h3>Popular Videos</h3>
				<a href="#">TOP 5 UPCOMING CARS IN INDIA IN 2016</a>
			   <iframe src="https://www.youtube.com/embed/aBoRSKJtQeE"></iframe>
			</div>
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
