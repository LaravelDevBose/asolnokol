@extends('frontEnd.master')

@section('title')
Blog | Aslol Vs Nokol
@endsection

@section('mainContent')
<!--/blogContent-->
<div class="tips w3l">
	<div class="container">
	 	<div class="col-md-9 tips-info">
	<?php $i=0; ?>
	@foreach($blogsInfo as $blogInfo)

	 	@if( $i%2 ==0 )
		 	<div class="news-grid">
		    	<div class="news-img">
		    	<?php  
					$blogImage= DB::table('blog_images')->where('blogId', $blogInfo->id )->value('imagePath');
					if(!file_exists($blogImage)){
						$blogImage = 'public/frontEnd/images/placeholder.jpg';
					}

				?>
			  		<a href="{{url('singel.blog/'.$blogInfo->id) }}"> <img src="{{ asset( $blogImage ) }}" alt="{{ $blogInfo->blogTitel }} " class="img-responsive"></a>
			  		<span class="price1">NEW</span>
				</div>
			    <div class="news-text">
				   <h3><a href="{{url('singel.blog/'.$blogInfo->id) }}">{{ $blogInfo->blogTitel }}</a></h3>
					<ul class="news">
						<li><i class="fa fa-user" aria-hidden="true"></i> <a href="#">Admin</a></li>

					<?php $comments=DB::table('blog_comments')->where('blogId',$blogInfo->id)->get();?>
						<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="{{url('singel.blog/'.$blogInfo->id) }}"><?php $comment=count( $comments ); echo $comment; ?> Comments</a></li>
		    		<?php $likes= DB::table('blog_likes')->where('blogId', $blogInfo->id )->first(); ?>
						<li><i class="fa fa-heart" aria-hidden="true"></i> <a href="{{url('singel.blog/'.$blogInfo->id) }}">@if(empty($likes))<?php echo 0;?>@else{{ $likes->likes }}@endif Likes</a></li>
					</ul>
				</div>
				<div class="blog-des">
					{!! $blogInfo->shortDescription !!}
					<a href="{{url('singel.blog/'.$blogInfo->id) }}" class="read hvr-shutter-in-horizontal">Read More</a>
				</div>

			<div class="clearfix"></div>
		 	</div>
		 @else
		  	<div class="news-grid agile-w3l">
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
						<li><i class="fa fa-user" aria-hidden="true"></i> <a href="#">Admin</a></li>
					<?php $blogComments= DB::table('blog_comments')->where('blogId', $blogInfo->id )->get(); ?>
						<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="{{url('singel.blog/'.$blogInfo->id) }}">{{ count($blogComments)}} Comments</a></li>
		    		<?php $likes= DB::table('blog_likes')->where('blogId', $blogInfo->id )->first(); ?>
						<li><i class="fa fa-heart" aria-hidden="true"></i> <a href="{{url('singel.blog/'.$blogInfo->id) }}">@if(empty($likes))<?php echo 0;?>@else{{ $likes->likes }}@endif Likes</a></li>
					</ul>
				</div>
				<div class="blog-des">
					{!! $blogInfo->shortDescription !!}
					<a href="{{url('singel.blog/'.$blogInfo->id) }}" class="read hvr-shutter-in-horizontal">Read More</a>
				</div>
				<div class="clearfix"></div>
		 	</div>
		@endif
		 <?php $i++; ?>
	@endforeach
			<div class="clearfix"></div>
			<div class="blog-pagenat">
				<!-- Pagination link -->
				{{ $blogsInfo->links() }}
			</div>
			<div class="clearfix"></div>
			<div class="videos row">
			@foreach($videoNewsInfos as $videoNewsInfo)
				<div class="col-md-6">
   					<iframe src="{{ $videoNewsInfo->videoLink}}"></iframe>
				</div>
			@endforeach
				<div class="blog-pagenat">
					<!-- Pagination link -->
					{{ $videoNewsInfos->links() }}
				</div>
			</div>

		</div>
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
								<a href="{{url('singel.blog/'.$topBlog->id) }}"><img src="{{ asset( $blogImage ) }}" alt="{{ $topBlog->blogTitel }} " class="img-responsive" ></a>
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
		</div>
		<div class="clearfix"> </div>
	</div>
</div>
<!-- // blogContent -->

@endsection