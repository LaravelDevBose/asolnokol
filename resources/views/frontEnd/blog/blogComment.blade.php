
			<link href="{{ asset('public/frontEnd/contactus/css/style.css')}}" rel="stylesheet" type="text/css" media="all" /><!-- style.css -->

				<div class="post-ad-form">
					<div class="personal-details">
					@if (Auth::guest())
						<div class="alert alert-info">
							<h4 class="text-center"> Sir For Your valuable Comment Please Login !</h4>
							<p class="text text-center"> If You Are Not Register Please Register first..!</p>

						</div>
						<div>
							<a id="top" href="" class="btn btn-block btn-flat btn-success"> Sign Up</a>
							<a id="top" href="" class="btn btn-block btn-flat btn-info"> Login</a>
						</div>
					@else
						{!! Form::Open(['url'=>'/blog.comment','method'=>'POST']) !!}
							<input type="hidden" name="blogId" value="{{ $singelBlog->id }}" >
							<input type="hidden" name="userId" value="$userId">
							<label>Comment<span>*</span></label>
								<textarea name="comment" rows="4"></textarea>>
								<div class="clearfix"></div>

							<input type="submit" value="Comment">					
							<div class="clearfix"></div>
						{!!Form::close()!!}
					@endif
					</div>
				</div>
			</div>