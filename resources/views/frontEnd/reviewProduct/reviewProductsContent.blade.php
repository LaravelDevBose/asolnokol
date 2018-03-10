@extends('frontEnd.master')

@section('title')
Product-Review | Aslol Vs Nokol
@endsection

@section('mainContent')
<div class="tips w3l">
    
    <div class="container">
        <div class="col-md-9 tips-info">
            @if (!empty(Session::get('msg')) ||$errors->any())
                <span class="text-center text-success">{{ Session::get('msg') }}</span>
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
            @foreach ($productsReview as $product)
            
            @if (Auth::guest())
                <div class="news-grid" style="min-height:325px" >
            @else
                <div class="news-grid" style="min-height:230px">
            @endif
            
                @if (Session::get('rattingMsg'))
                    <label class="text-center text-success text-small">{{ Session::get('rattingMsg') }}</label>
                @endif
                <div class="news-img up">
                    <?php  
                        $productImage=DB::table('products_images')->where('productId', $product->id)->value('imagePath'); 
                        if(!file_exists($productImage)){
                            $productImage=DB::table('fack_products_images')->where('productId', $product->id)->value('fackProductImagePath');

                            if(!file_exists($productImage)){
                                $productImage = 'public/frontEnd/images/placeholder.jpg';   
                            }
                        }

                    ?>
                    <a href="{{ url('/singel.product/'.$product->id )}}"> <img src="{{ asset( $productImage )}}" alt=" {{ $product->productName }}" class="img-responsive"></a>
                    <span class="price1">NEW</span>
                </div>
                <div class="news-text coming">
                    
                    <h3><a href="{{ url('/singel.product/'.$product->id )}}">{{ $product->productName }}</a></h3>
                    <p class="star-review">

                        <?php $rating = DB::table('start_ratings')->where('productId', $product->id)->first(); 

                        if(!is_null($rating) && !Auth::guest()){
                            $userIds = explode(',', $rating->userId);
                                $cheakUser = False;
                                for ($i=0; $i <count($userIds) ; $i++) { 
                                    if($userIds[$i]== Auth::User()->id){
                                        $cheakUser = True;
                                    }
                                }
                        }
                        ?>
                        @if (is_null($rating))
                            @for ($i = 1; $i <=5 ; $i++)
                                @if (Auth::guest())
                                    <a title="Rate = {{ $i }}" href="{{ url('login') }}">
                                @else
                                    <a title="Rate = {{ $i }}" href="{{ url('/startRating/'.$product->id.'/'.$i) }}">
                                @endif
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                </a>
                            @endfor
                         
                    </p>
                    <span>0 Review</span>
                            {{-- expr --}}
                        @else
                            @for ($i = 1; $i <=5 ; $i++)
                                {{-- chaeck user access --}}
                                @if (Auth::guest())
                                    <a title="Rate = {{ $i }}" href="{{ url('login') }}">
                                @elseif($cheakUser == True)

                                @else
                                    <a title="Rate = {{ $i }}" href="{{ url('/startRating/'.$product->id.'/'.$i) }}">
                                @endif
                            
                                {{-- Chaeck the reating value --}}
                                @if($i <= $rating->rating )
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    
                                @else
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                    
                                @endif

                                {{-- cheack the user Account  --}}
                                @if (Auth::guest())
                                    </a>
                                @elseif($cheakUser == True)

                                @else
                                    </a>
                                @endif

                                

                        @endfor
                         
                    </p>
                    <span>{{ $rating->totalRates }} Review</span>

                        @endif

                        
                    <p class="like-comment">
                        @php
                            $totalLike = DB::table('userlikes')->where('productId',$product->id)->first();
                            $totalreview = DB::table('product_reviews')->where('productId', $product->id)->select('id')->get();
                        @endphp

                        <a href="{{ url('product.like/'. $product->id ) }}"><i class="fa fa-heart" aria-hidden="true"></i></a> @if(empty($totalLike))<?php echo 0;?>@else{{ $totalLike->totalLikes }}@endif Like
                        
                        <i class="fa fa-envelope" aria-hidden="true"></i> {{ count($totalreview) }} Comment
                    </p>
                    
                </div>

                <div class="review">
                    <form action="{{ url('/review/store') }}" method="POST">
                        {{ csrf_field() }}
                    
                        <input type="hidden" name="productId" value="{{ $product->id }}">

                        @if (Auth::guest())
                            <div class="form-group">
                                <input type="text" name="name" class="form-control"  placeholder="Fufll Name">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control"  placeholder="Enter email">
                            </div>
                        @else
                            <input type="hidden" name="name" value="{{ Auth::user()->name }}">
                            <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                        @endif

                        <div class="form-group">
                            <textarea class="form-control" name="review"  placeholder="Submit Your Review" > </textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-primary pull-right">Submit</button>
                    </form>
                    
                </div>
                <div class="clearfix"></div>
            </div>
            @endforeach 
             
            <div class="blog-pagenat">
                {{ $productsReview->links() }}
            </div>
            <div class="clearfix"></div> 
        </div>
         
        <div class="col-md-3 advice-right w3-agile">
            <div class="blo-top1">
                <div class="tech-btm">
                @include('frontEnd.socialmedia.facebookPagePlagin')
                </div>
            </div>
            <div class="blo-top1">
                <div class="agileits_twitter_posts">
                    <section class="sky-form">
                        <h4>Category Name</h4>
                        <div class="form-inner">
                            <ul style="list-style:none;">
                            @foreach($categories as $category )
                                <li> <b class="text text-success">*</b>
                                    <a style="text-size:18px; padding:5px;" href="{{ url('/product-review/category/'.$category->id) }}">
                                        {{ $category->categoryName }}
                                    </a>
                                </li>
                            @endforeach
                            </ul>
                        </div>

                        <h4>Company Name</h4>
                        <div class="form-inner">
                            <ul style="list-style:none;">
                            @foreach($manufacturers as $manufacturer)
                                <li><b class=" text  text-success" >*</b>
                                    <a style="text-size:18px; padding:5px;" href="{{ url('/product-review/manufacture/'.$manufacturer->id) }}">
                                        {{ $manufacturer->manufacturerName }}
                                    </a>
                                </li>
                            @endforeach
                            </ul>
                        </div>
                    </section>
                </div>
            </div>
            <div class="blo-top">
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

            <div class="blo-top1 w3l">
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
                            <a href="{{ url('/singel.blog/'.$topBlog->id ) }}"><img src="{{ asset( $blogImage )}}" class="img-responsive" alt="{{ $topBlog->blogTitel }}"></a>
                        </div>
                        <div class="blog-grid-right">
                            <h5><a href="{{ url('/singel.blog/'.$topBlog->id ) }}">{{ $topBlog->blogTitel }}</a> </h5>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>


@endsection