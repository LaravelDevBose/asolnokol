<!-- //signUpContent -->
<div class="modal ab fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog sign" role="document">
		<div class="modal-content about">
			<div class="modal-header one">
				<button type="button" class="close sg" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>	
				<div class="discount one">
					<h3>Sign Up</h3>
				</div>							
			</div>
			<div class="modal-body about">
				<div class="login-top sign-top one">
					{!! Form::Open(['url'=>'register','method'=>'POST']) !!}
						{!! Form::text('name', null,['class'=>'name active','placeholder'=>'Your Name','required']) !!}
						{!! Form::text('email', null,['class'=>'email', 'placeholder'=> ' Email' ,'required']) !!}
						{!! Form::text('phone', null,['class'=>'phone', 'placeholder'=>'Phone Number','required']) !!}
						{!! Form::password('password',['class'=>'password','placeholder'=>'password', 'required' ]) !!}
						{!! Form::password('password_confirmation',['class'=>'password','placeholder'=> 'Re-Password' ,'required']) !!}
						<input type="checkbox" id="brand1" value="">
						<label for="brand1"><span></span> Remember me?</label>
						<div class="login-bottom one">
							<ul>
								<li>
									<a href="#">Forgot password?</a>
								</li>
								<li>
								  {!! Form::submit('Register') !!}
								</li>
							<div class="clearfix"></div>
							</ul>
						</div>	
					{!!Form::close()!!}
				</div>
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
<!-- //signUpContent -->