@extends('frontEnd.master')

@section('title')
Product-Review | Aslol Vs Nokol
@endsection

@section('mainContent')
<div class="tips w3l">
    
    <div class="container">
        <div class="user-login">
                <h3>User Login Panel</h3>
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
        </div>
    </div>
</div>


@endsection