<div class="blo-top col-md-12">
	<div class="tech-btm">
		<h4 style=" text-align: center;">Sign up to newsletter</h4>
		<p class="text-center text-info">Asol <b>Vs</b> Nokol</p>
		<h5 class="text-center text-success">{{ Session::get('success') }}</h5>
        <hr/>
        @if($errors->any())
          <div class="well">
              <ul class="alert alert-danger">
                  @foreach($errors->all() as $error)
                  <li>{{$error}}</li>
                  @endforeach
              </ul>
          </div>
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
	<div class="agileits_twitter_posts tech-btm">
		<h3 class="text text-center">Resent Product</h3>
		@foreach( $latestproducts as $latestproduct )
			<div class="related-post">
			<?php  
                $productImage=DB::table('products_images')->where('productId', $latestproduct->id)->value('imagePath'); 
                if(!file_exists($productImage)){
                    $productImage=DB::table('fack_products_images')->where('productId', $latestproduct->id)->value('fackProductImagePath');

                    if(!file_exists($productImage)){
                        $productImage = 'public/frontEnd/images/placeholder.jpg';   
                    }
                }

            ?>
				<div class="related-post-left">
					<a href="{{ url('/singel.product/'.$latestproduct->id ) }}"><img src="{{ asset( $productImage )}}" alt="{{ $latestproduct-> productName }}" class="img-responsive"></a>
				</div>
				<div class="related-post-right">
					<h4><a href="{{ url('/singel.product/'.$latestproduct->id ) }}">{{ $latestproduct-> productName }}</a></h4>
					
				</div>
				<div class="clearfix"> </div>
				<div class="list-form col-md-offset-6">
					<a  href="{{ url('/singel.product/'.$latestproduct->id )}}" class="read hvr-shutter-in-horizontal scroll">Read More</a>
                    <div class="clearfix"></div>
                </div>
			</div>
		@endforeach
	</div>
</div>
<div class="related-posts">
	<h3>Top stories of the week </h3>
	@foreach($topBlogs as $topBlog)
		<div class="related-post">
			<div class="related-post-left">
			<?php  
				$blogImage= DB::table('blog_images')->where('blogId', $topBlog->id )->value('imagePath');
				if(!file_exists($blogImage)){
					$blogImage = 'public/frontEnd/images/placeholder.jpg';
				}

			?>				
			<a href="{{ url('/singel.blog/'.$topBlog->id ) }}"><img src="{{ asset( $blogImage )}}" alt="{{  $topBlog->blogTitel }} " class="img-responsive"></a>
			</div>
			<div class="related-post-right">
				<h4><a href="{{ url('/singel.blog/'.$topBlog->id ) }}">{{ $topBlog->blogTitel }}</a></h4>
				<ul class="news">
		    <?php $totalComments= DB::table('blog_comments')->where('blogId', $topBlog->id )->select('comment')->get(); ?>
					<li><i class="fa fa-envelope" aria-hidden="true"></i> <a href="{{url('singel.blog/'.$topBlog->id) }}">{{ count($totalComments) }} </a></li>
		    <?php $totalLikes= DB::table('blog_likes')->where('blogId', $topBlog->id )->select('likes')->first(); ?>
					<li><i class="fa fa-heart" aria-hidden="true"></i> <a href="{{url('singel.blog/'.$topBlog->id) }}"><?php if(empty($totalLikes)){echo 0;}else{ echo $totalLikes->likes;} ?></a></li>
				</ul>
			</div>
			<div class="clearfix"> </div>
			<div class="list-form col-md-offset-6">
				<a  href="{{ url('/singel.blog/'.$topBlog->id )}}" class="read hvr-shutter-in-horizontal scroll">Read More</a>
	            <div class="clearfix"></div>
	        </div>
		</div>	
	@endforeach
</div>
<div class="popular-videos">
    <h3>Popular Videos</h3>
	<a href="#">{{ $latestVideo->videoTitle}}</a>
   <iframe src="{{ $latestVideo->videoLink}}"></iframe>
</div>
