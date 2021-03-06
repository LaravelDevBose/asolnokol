@extends('frontEnd.master')

@section('title')
Complain- area| Aslol Vs Nokol
@endsection

@section('mainContent')

<link href="{{ asset('public/frontEnd/contactus/css/style.css')}}" rel="stylesheet" type="text/css" media="all" /><!-- style.css -->
<script>
  $(document).ready(function () {
    var mySelect = $('#first-disabled2');

    $('#special').on('click', function () {
      mySelect.find('option:selected').prop('disabled', true);
      mySelect.selectpicker('refresh');
    });

    $('#special2').on('click', function () {
      mySelect.find('option:disabled').prop('disabled', false);
      mySelect.selectpicker('refresh');
    });

    $('#basic2').selectpicker({
      liveSearch: true,
      maxOptions: 1
    });
  });
</script>
<!-- contact -->
	<div class="contact main-grid-border">
		<div class="container">
			<h2 class="w3-head text-center">Complain Area</h2>
			<h3 class="text-center text-success">{{ Session::get('success') }}</h3>
            <hr/>
            @if($errors->any())
                <div class="well">
                    <ul class="alert alert-danger">
                        @foreach($errors->all() as $error)
                        <li><h4>Sir !{{$error}}</h4></li>
                        @endforeach
                    </ul>
                </div>
            @endif
			<section id="hire">
			@if(empty(Auth::user() ))    
				{!! Form::Open(['url'=>'/complian/store ','method'=>'POST' , 'id' =>'filldetails']) !!}
				  	<div class="field name-box">
						<input type="text" name="name" value="{{ old('name') }}" placeholder="Who Are You?"/>
						<label>Name</label>
						<span class="ss-icon">Name</span>
				  	</div>
				  
				  	<div class="field email-box">
						<input type="text" name="email" value="{{ old('email') }}" placeholder="example@email.com"/>
						<label>Email</label>
						<span class="ss-icon">Email</span>
				  	</div>
				  	<div class="field email-box">
						<input type="text" name="subject"  value="{{ old('subject') }}" placeholder="Subject"/>
						<label>Subject</label>
						<span class="ss-icon">Subject</span>
				  	</div>

				  	<div class="field msg-box">
						<textarea id="msg" rows="4" name="message" placeholder="Your message goes here..."></textarea>
						<label>Your Msg</label>
						<span class="ss-icon">Complain</span>
				  	</div>
				  	<div class="form-group">
						<input class="button btn btn-block btn-flat" type="submit" value="Send" />
				  	</div>
			 	{!!Form::close()!!}
			 @else
				{!! Form::Open(['url'=>'/complian/store','method'=>'POST' , 'id' =>'filldetails']) !!}
					<input type="hidden" name="userId" value="{{ Auth::user()->id }}">
			 		<div class="field email-box">
						<input type="text" name="subject" value="{{ old('subject') }}" placeholder="Subject"/>
						<label>Subject</label>
						<span class="ss-icon">Subject</span>
				  	</div>

			 		<div class="field msg-box">
						<textarea id="msg" rows="4" name="message"  placeholder="Your message goes here..."></textarea>
						<label>Your Msg</label>
						<span class="ss-icon">Complain</span>
				  	</div>
				  	<div class="form-group">
						<input class="button btn btn-block btn-flat" type="submit" value="Send" />
				  	</div>
			 	{!!Form::close()!!}
			 @endif
			
			<div class="clear"></div>
			
			<!-- JavaScript Includes -->
			<script src="{{ asset('public/frontEnd/contactus/js/jquery.knob.js ')}}"></script>
			
			<!-- Our main JS file -->
			<script src="{{ asset('public/frontEnd/contactus/js/script.js ')}}"></script>
		</div>
	</section>
			<script>
				  $('textarea').blur(function () {
				$('#hire textarea').each(function () {
					$this = $(this);
					if (this.value != '') {
						$this.addClass('focused');
						$('textarea + label + span').css({ 'opacity': 1 });
					} else {
						$this.removeClass('focused');
						$('textarea + label + span').css({ 'opacity': 0 });
					}
				});
			});
			$('#hire .field:first-child input').blur(function () {
				$('#hire .field:first-child input').each(function () {
					$this = $(this);
					if (this.value != '') {
						$this.addClass('focused');
						$('.field:first-child input + label + span').css({ 'opacity': 1 });
					} else {
						$this.removeClass('focused');
						$('.field:first-child input + label + span').css({ 'opacity': 0 });
					}
				});
			});
			$('#hire .field:nth-child(2) input').blur(function () {
				$('#hire .field:nth-child(2) input').each(function () {
					$this = $(this);
					if (this.value != '') {
						$this.addClass('focused');
						$('.field:nth-child(2) input + label + span').css({ 'opacity': 1 });
					} else {
						$this.removeClass('focused');
						$('.field:nth-child(2) input + label + span').css({ 'opacity': 0 });
					}
				});
			});
			$('#hire .field:nth-child(3) input').blur(function () {
				$('#hire .field:nth-child(3) input').each(function () {
					$this = $(this);
					if (this.value != '') {
						$this.addClass('focused');
						$('.field:nth-child(3) input + label + span').css({ 'opacity': 1 });
					} else {
						$this.removeClass('focused');
						$('.field:nth-child(3) input + label + span').css({ 'opacity': 0 });
					}
				});
			});
			$('#hire .field:nth-child(4) input').blur(function () {
				$('#hire .field:nth-child(4) input').each(function () {
					$this = $(this);
					if (this.value != '') {
						$this.addClass('focused');
						$('.field:nth-child(4) input + label + span').css({ 'opacity': 1 });
					} else {
						$this.removeClass('focused');
						$('.field:nth-child(4) input + label + span').css({ 'opacity': 0 });
					}
				});
			});
		  //@ sourceURL=pen.js
		</script>    
		<script>
	  if (document.location.search.match(/type=embed/gi)) {
		window.parent.postMessage("resize", "*");
	  }
	</script>
		</div>	
		<!-- address -->
		
	</div>

	<!-- // contact -->

	

@endsection

