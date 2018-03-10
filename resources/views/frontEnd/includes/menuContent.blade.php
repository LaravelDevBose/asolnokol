
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontEnd/css/customMenu.css')}}" />


<div class="navbar-wrapper" id="top">
    <div class="container-fluid">
        <nav class="navbar navbar-fixed-top">
            
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('public/backEnd/images/Logo.jpg') }}"></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                    @foreach($menusInfo as $menuInfo)

                        @if($menuInfo->childId != 0)
                            @if($menuInfo->childId == 1)
                            <?php $categories= DB::table('categories')->where('publicationStatus', 1)->get();?>
                                <li class=" dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" >{{ $menuInfo->menuName }}</a>
                                    <ul class="dropdown-menu">
                                    @foreach($categories as $category)
                                        <li><a href="{{ url('/view.category.product/'.$category->id) }}">{{ $category->categoryName }}</a></li>
                                    @endforeach
                                    </ul>
                                </li>
                            @else
                            <?php $manufacturers= DB::table('manufacturers')->where('publicationStatus', 1)->get();?>
                                <li class=" dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" >{{ $menuInfo->menuName }}</a>
                                    <ul class="dropdown-menu">
                                    @foreach($manufacturers as $manufacturer)
                                        
                                        <li><a href="{{ url('/view.manufacturer.product/'.$manufacturer->id) }}">{{ $manufacturer->manufacturerName }}</a></li>
                                    
                                    @endforeach
                                    </ul>
                                </li>
                            @endif
                            
                        @else
                            @if($menuInfo->position == 1)
                            <li class="active"><a href="{{ url( $menuInfo->menuUrl ) }}" class="">{{ $menuInfo->menuName }}</a></li>
                            @else
                            <li><a href="{{ url( $menuInfo->menuUrl ) }}" class="">{{ $menuInfo->menuName }}</a></li>
                            @endif
                        @endif
                    @endforeach
                    </ul>

                    <div class="header-top">
                        <div class="search-box">
                            <div id="sb-search" class="sb-search">
                                {!! Form::Open(['url'=>'/search.productName','method'=>'POST']) !!}
                                    <input name="productName" class="sb-search-input" placeholder="Enter Product Name..." type="search" id="search">
                                    <input class="sb-search-submit" type="submit" value="">
                                    <span class="sb-icon-search"> </span>
                                {!!Form::close()!!}
                            </div>
                            <!-- search-scripts -->
                            <script src="{{ asset('public/frontEnd/js/classie.js')}}"></script>
                            <script src="{{ asset('public/frontEnd/js/uisearch.js')}}"></script>
                                <script>
                                    new UISearch( document.getElementById( 'sb-search' ) );
                                </script>
                            <!-- //search-scripts -->
                          
                            <ul>

                            @if (Auth::guest())
                                    <li>
                                    <a href="{{url('/register')}}" data-toggle="modal" data-target="#myModal2"><span class="glyphicon glyphicon-log-in" ></span>Sign Up</a></li>
                                    <li><button id="showRight" class="navig">Login </button>
                                    <div class="cbp-spmenu-push">
                                        <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right" id="cbp-spmenu-s2">
                                            <h3>Login</h3>
                                        <div class="login-inner">
                                            <div class="login-top">
                                                {!! Form::Open(['url'=>'/login','method'=>'POST']) !!}
                                                    {!! Form::text('email', null,['class'=>'email', 'placeholder'=> ' Email' ,'required']) !!}
                                                    {!! Form::password('password',['class'=>'password', 'placeholder'=> ' Password' ,'required']) !!}   
                                                    <input type="checkbox" id="brand" value="remember">
                                                    <label for="brand"><span></span> Remember me</label>
                                                
                                                <div class="login-bottom">
                                                    <ul>
                                                        <li>
                                                            <a href="{{ url('password.reset')}}">Forgot password?</a>
                                                        </li>
                                                        <li>
                                                            
                                                                {!! Form::submit('LogIn') !!}
                                                            {!!Form::close()!!}
                                                        </li>
                                                    </ul>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="social-icons">
                                                <ul> 
                                                    <li><a href="{{ url('/login/facebook') }}"><span class="icons"></span><span class="text">Facebook</span></a></li>
                                                    <li class="twt"><a href="{{ url('/login/twitter') }}"><span class="icons"></span><span class="text">Twitter</span></a></li>
                                                    <li class="ggp"><a href="{{ url('/login/google') }}"><span class="icons"></span><span class="text">Google+</span></a></li>
                                                </ul> 
                                            </div>     
                                        </div> 
                                        </nav>
                                    </div> 
                                <script src="{{ asset('public/frontEnd/js/classie2.js')}}"></script>
                                    <script>
                                        var menuRight = document.getElementById( 'cbp-spmenu-s2' ),
                                            showRight = document.getElementById( 'showRight' ),
                                            body = document.body;
                            
                                        showRight.onclick = function() {
                                            classie.toggle( this, 'active' );
                                            classie.toggle( menuRight, 'cbp-spmenu-open' );
                                            disableOther( 'showRight' );
                                        };
                            
                                        function disableOther( button ) {
                                            if( button !== 'showRight' ) {
                                                classie.toggle( showRight, 'disabled' );
                                            }
                                        }
                                    </script>
                                <!--Navigation from Right To Left-->
                                    </li>
                            @else
                                <li>
                                    <a href="{{url('/')}}" >
                                    <span class="glyphicon glyphicon-home" ></span><strong>{{ Auth::user()->name }}</strong></a>
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); 
                                        document.getElementById('logout-form').submit();">Logout</a>
                                    {!! Form::Open(['url'=>'/logout','method'=>'POST' ,'id'=>'logout-form', '']) !!}
                                    <!-- <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}  -->
                                    {!!Form::close()!!}
                                </li>
                            @endif
                            <li class="fb_icon"><a href="https://www.facebook.com/asolnokolbd/" target="_blank" title="Facebook Page"><img src="{{ asset('public/frontEnd/images/fb_icon.png') }}"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            
        </nav>
    </div>
</div>
