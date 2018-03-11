@extends('frontEnd.master')

@section('title')
HOME | Aslol Vs Nokol
@endsection

@section('mainContent')
<!-- product Content -->
<div class="car-loan-mid w3l">
	<div class="row ">
		<div class="col-sm-12 col-md-2">
			<div class="cat_adds_left">
		 		<img src="{{ asset('public/frontEnd/images/magazine-ad.jpg')}} ">
		 	</div>

		 	<div class="cat_adds_left-mobile">
		 		<img src="{{ asset('public/frontEnd/images/magazine-ad3.jpg')}} ">
		 	</div>
		</div>
		
	 	<div class="col-sm-12 col-md-8">
			
			<div class="row">
				<h3 class="tittle">Latest Product Information</h3>
				<div class="latestProduct">
					@foreach($letestProducts as $letestProduct )
						<div class="col-md-3 col-sm-3 col-xs-6 divider">
							<div class="focus-border fixed-hight">

								<?php  
									$productImage=DB::table('products_images')->where('productId', $letestProduct->id)->value('imagePath'); 
									if(!file_exists($productImage)){
										$productImage=DB::table('fack_products_images')->where('productId', $letestProduct->id)->value('fackProductImagePath');
										if(!file_exists($productImage)){
											$productImage = 'public/frontEnd/images/placeholder.jpg';	
										}
									}

								?>
								<div class="imageStyle" ><a href="{{ url('/singel.product/'.$letestProduct->id ) }}"><img src="{{ asset( $productImage )}}" alt="{!! $letestProduct->productName !!}"></a></div>
								<div class="clearfix"></div>
								<div class="heading"><a href="{{ url('/singel.product/'.$letestProduct->id ) }}">{!! $letestProduct->productName !!}</a></div>
								<div class="clearfix"></div>

							</div>
						</div>
					@endforeach
						
				</div>
			</div>
			
				
			<div class="clearfix"></div>

			<div class="row">
				<h3 class="tittle">All Category </h3>

				<div class="categories">
			    		@foreach($categories as $category)
			    	
					<div class="col-md-3 focus-grid">
						<a href="{{ url('/view.category.product/'.$category->id )}}" >
							<div class="focus-border">
								<div class="focus-layout">
									<div class="focus-image"><i class="{{ $category->icon }}"></i></div>
									<h4 class="clrchg">{{ $category->categoryName }}</h4>
								</div>
							</div>
						</a>
					</div>
					@endforeach	
					<div class="clearfix"></div> 
				</div>
			</div>
			<div class="clearfix"></div>
		</div>

		<div class="col-sm-12 col-md-2">
			<div class="cat_adds_right">
		 		<img src="{{ asset('public/frontEnd/images/magazine-ad3.jpg')}} ">
		 	</div>

		 	<div class="cat_adds_right-mobile">
		 		<img src="{{ asset('public/frontEnd/images/magazine-ad.jpg')}} ">
		 	</div>
		</div>
		
	</div>
	
</div>
<!-- /. product container -->
<div class="clearfix"></div>

<!-- Blog content -->
<div class="tips w3l">
<div class="container">
	
 	<div class="col-md-9 tips-info">
 		<div class="latestBlog">
 			<h3 class="tittle">Latest Blog Information </h3>
		<?php $i=0; ?>
	 	@foreach($blogsInfo as $blogInfo)

	 	@if( $i%2 ==0 )
		 <div class="news-grid">
		 	<div class="news-werp">
		 		<div class="news-img">
			    <?php  
					$blogImage= DB::table('blog_images')->where('blogId', $blogInfo->id )->value('imagePath');
					if(!file_exists($blogImage)){
						$blogImage = 'public/frontEnd/images/placeholder.jpg';
					}

				?>
				  <a href="{{url('singel.blog/'.$blogInfo->id) }}"> <img src="{{ asset( $blogImage) }}" alt="{{ $blogInfo->blogTitel }}" class="img-responsive"></a>
				  <span class="price1">NEW</span>
				</div>
			    <div class="news-text">
				   <h3><a href="{{url('singel.blog/'.$blogInfo->id) }}">{{ $blogInfo->blogTitel }}</a></h3>
					<ul class="news">
						{{-- <li><i class="fa fa-user" aria-hidden="true"></i> <a href="#">Admin</a></li> --}}
			    <?php $totalLikes= DB::table('blog_likes')->where('blogId', $blogInfo->id )->select('likes')->first(); ?>
						<li><i class="fa fa-heart" aria-hidden="true"></i> <a href="{{url('singel.blog/'.$blogInfo->id) }}"><?php if(empty($totalLikes)){echo 0;}else{ echo $totalLikes->likes;} ?> Likes</a></li>
			    <?php $totalComments= DB::table('blog_comments')->where('blogId', $blogInfo->id )->select('comment')->get(); ?>
						<li><i class="fa fa-envelope" aria-hidden="true"></i> <a href="{{url('singel.blog/'.$blogInfo->id) }}">{{ count($totalComments) }}Comments</a></li>
					</ul>
				</div>
		 	</div>
		    <div class="clearfix"></div>
			<div class="news-des">
				{!! $blogInfo->shortDescription !!}
				<a href="{{url('singel.blog/'.$blogInfo->id) }}" class="read hvr-shutter-in-horizontal">Read More</a>
			</div>
			<div class="clearfix"></div>
		 </div>
		 @else
		  <div class="news-grid agile-w3l">
		  	<div class="news-werp">
			    <div class="news-img two">
			    <?php  
					$blogImage= DB::table('blog_images')->where('blogId', $blogInfo->id )->value('imagePath');
					if(!file_exists($blogImage)){
						$blogImage = 'public/frontEnd/images/placeholder.jpg';
					}

				?>
				   <a href="{{url('singel.blog/'.$blogInfo->id) }}"><img src="{{ asset( $blogImage ) }}" alt="{{ $blogInfo->blogTitel }} " class="img-responsive"></a>
				   <span class="price">NEW</span>
				</div>
			    <div class="news-text two">
				   <h3><a href="{{url('singel.blog/'.$blogInfo->id) }}">{{ $blogInfo->blogTitel }}</a></h3>
					<ul class="news">
						{{-- <li><i class="fa fa-user" aria-hidden="true"></i> <a href="#">Admin</a></li> --}}
			    <?php $totalLikes= DB::table('blog_likes')->where('blogId', $blogInfo->id )->select('likes')->first(); ?>
						<li><i class="fa fa-heart" aria-hidden="true"></i> <a href="{{url('singel.blog/'.$blogInfo->id) }}"><?php if(empty($totalLikes)){echo 0;}else{ echo $totalLikes->likes;} ?> Likes</a></li>
			    <?php $totalComments= DB::table('blog_comments')->where('blogId', $blogInfo->id )->select('comment')->get(); ?>
						<li><i class="fa fa-envelope" aria-hidden="true"></i> <a href="{{url('singel.blog/'.$blogInfo->id) }}">{{ count($totalComments) }} Comments</a></li>
					</ul>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="news-des">
				{!! $blogInfo->shortDescription !!}
				<a href="{{url('singel.blog/'.$blogInfo->id) }}" class="read hvr-shutter-in-horizontal">Read More</a>
			</div>
			<div class="clearfix"></div>
		 </div>
		 @endif
		 <?php  $i++; ?>

		@endforeach
		<div class="clearfix"></div>
		{{ $blogsInfo ->links() }}
		</div>
		<div class="clearfix"></div>
		
		<div class="blog_bottom_adds">
			<img src="{{ asset('public/frontEnd/images/blog_bottom_adds.gif')}} ">
		</div>
		
		<div class="youtube-video">
			<h3 class="tittle ">Latest Video News</h3>
			@foreach ($latestVideos as $latestVideo)
				<div class="col-md-6 col-sm-6">
					<div class="videos">
						<div class="video-title">
							<h3><a href="#">{{ $latestVideo->videoTitle }}</a></h3>
						</div>
						
					   	<iframe src="{{ $latestVideo->videoLink }}" frameborder="0" allowfullscreen></iframe>
					</div>
				</div>
			@endforeach
			
		</div>
		<div class="clearfix"></div>
		{{ $latestVideos ->links() }}
		<div class="clearfix"></div>
	</div>
	
		<!-- left Side end	 -->

		<!-- Right Side start	 -->
	   	<div class="col-md-3 advice-right w3l">
			<div class="blo-top">
				<div class="tech-btm">
					<h4>Sign up to our newsletter</h4>
					<p class="text-center text-info">Asol <b>Vs</b> Nokol</p>
					@if (Session::get('success') || Session::get('sub_error'))
						<h5 class="text-center text-success">{{ Session::get('success') }}</h5>
			            @if($errors->any())
			              <div class="well">
			                  <ul class="alert alert-danger">
			                      @foreach($errors->all() as $error)
			                      <li>{{$error}}</li>
			                      @endforeach
			                  </ul>
			              </div>
			            @endif
					@endif
						
					<div class="name">
						{!! Form::Open(['url'=>'/newsletter.subscriber.store','method'=>'POST']) !!}
							{!! Form::text('email', null,['class'=>'email', 'placeholder'=> 'Enter your email address', 'required']) !!}
							{!! Form::submit('Subscribe') !!}
						{!!Form::close()!!}
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<div class="blo-top1">

				<div class="tech-btm">
				@include('frontEnd.socialmedia.facebookPagePlagin')
				</div>
			</div>
			<div class="blo-top1">
				<div class="tech-btm">
					<h4>Complian Area</h4>
				
					@if (Session::get('com_success') || Session::get('error_msg') )
						<h4 class="text-center text-success">{{ Session::get('success') }}</h4>
			            @if($errors->any())
			                <div class="well">
			                    <ul class="alert alert-danger">
			                        @foreach($errors->all() as $error)
			                        <li>Sir !{{$error}}</li>
			                        @endforeach
			                    </ul>
			                </div>
			            @endif
					@endif
				</div>
				<div class="post-ad-form">
					@if (Auth::guest())
						{!! Form::Open(['url'=>'/complian/store','method'=>'POST']) !!}
							<input type="text" name="name" placeholder="Full Name" value="{{ old('name') }}" >
							<input type="text" name="email" placeholder="Email/Phone" value="{{ old('email') }}">
							<input type="text" name="subject" placeholder="Subject" value="{{ old('subject') }}" >
							<textarea name="message" rows="4" placeholder="Your Review"></textarea>
							<div class="clearfix"></div>
							<input type="submit" value="Submit">					
							<div class="clearfix"></div>
						{!!Form::close()!!}
					@else
						{!! Form::Open(['url'=>'/complian/store','method'=>'POST']) !!}
							<input type="hidden" name="name" value="{{Auth::user()->name}}">
							<input type="hidden" name="email" value="{{Auth::user()->email}}">
							<input type="text" name="subject" placeholder="Subject" value="{{ old('subject') }}" >
							<textarea name="message" rows="4" placeholder="Your Review"></textarea>
							<div class="clearfix"></div>
							<input type="submit" value="Submit">					
							<div class="clearfix"></div>
						{!!Form::close()!!}
					@endif
				</div>
			</div>
			@if($topBlogs != '0')
			<div class="blo-top1">
				<div class="tech-btm">
					<h4>Top stories of the week </h4>
					@foreach($topBlogs as $topBlog)
						<div class="blog-grids">
							<div class="blog-grid-left">
					    	<?php  
								$blogImage= DB::table('blog_images')->where('blogId', $topBlog->id )->value('imagePath');
								if(!file_exists($blogImage)){
									$blogImage = 'public/frontEnd/images/placeholder.jpg';
								}

							?>
								<a href="{{url('singel.blog/'.$topBlog->id) }}"><img src="{{ asset( $blogImage) }}" alt="{{ $topBlog->blogTitel }} " class="img-responsive" ></a>
							</div>
							<div class="blog-grid-right">
								<h5><a href="{{url('singel.blog/'.$topBlog->id) }}">{{ $topBlog->blogTitel }}</a> </h5>
							</div>
							<div class="clearfix"> </div>
						</div>
					@endforeach
				</div>
			</div>
			@endif
			
			<div class="blo-top1">
				<div class="bottom_add">
					<img src="{{ asset('public/frontEnd/images/bottom_adds.gif')}} ">
				</div>
			</div>
			
		</div>
		<div class="clearfix"> </div>
	</div>
</div>
<div class="clearfix"></div>
<!-- /slider1 -->
{{-- <div class="slider1">
	<div class="arrival-grids">			 
		<ul id="flexiselDemo1">
		@foreach( $manufacturers as $manufacturer )
			<li>
				<a href="{{ url('/view.manufacturer.product/'.$manufacturer->id) }}">
				<img style="height:150px;" src="{{ asset( $manufacturer->image )}}" alt="{{ $manufacturer->manufacturerName }}"/>
					<div class="caption">
						<h3><a href="{{ url('/view.manufacturer.product/'.$manufacturer->id) }}">{{ $manufacturer->manufacturerName }}</a></h3>	
					</div>
				</a>
			</li>
		@endforeach	
		</ul>
	</div>
 </div> --}}
<!-- //slider -->
<div class="clearfix"></div>
@endsection