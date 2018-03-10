<div class="footer" style=" margin-top: 20px;">
		<div class="container">
			<div class="footer-grids">
				<div class="col-md-4 col-md-offset-1 footer-grid animated wow slideInLeft" data-wow-delay=".5s">
					<h3>About Us</h3>
					{!! $contactUsInfo->aboutUs !!}
				</div>
				<div class="col-md-4 col-md-offset-1 footer-grid animated wow slideInLeft" data-wow-delay=".6s">
					<h3>Contact Info</h3>
					<ul>
						<li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>{{ $contactUsInfo->houseNo }}, Road- {{ $contactUsInfo->roadNo }}, Block-{{ $contactUsInfo->block }} <span>{{ $contactUsInfo->policeStation }}, {{ $contactUsInfo->district }}.</span></li>
						<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:{{ $contactUsInfo->emailAddress }}">{{ $contactUsInfo->emailAddress }}</a></li>
						<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+88{{ $contactUsInfo->phoneNo }}</li>
					</ul>
				</div>
				


				<!-- <div class="col-md-4 footer-grid animated wow slideInLeft" data-wow-delay=".8s">
					<h3>Blog Posts</h3>
					<div class="footer-grid-sub-grids">
						<div class="footer-grid-sub-grid-left">
							<a href="single.html"><img src="{{ asset('public/frontEnd/images/11.jpg')}}" alt=" " class="img-responsive" /></a>
						</div>
						<div class="footer-grid-sub-grid-right">
							<h4><a href="single.html">culpa qui officia deserunt</a></h4>
							<p>Posted On 25/3/2016</p>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div> -->
				<div class="clearfix"> </div>
			</div>
			<div class="footer-logo animated wow slideInUp" data-wow-delay=".5s">
				<h2><a href="{{ url('/') }}">Asol <b>Vs</b> Nokol</a></h2>
			</div>
			<div class="copy-right animated wow slideInUp" data-wow-delay=".5s">
				<p>&copy 2016 Catchy Carz. All rights reserved | Design by <a href="http://w3layouts.com/">W3layouts</a></p>
			</div>
		</div>
	</div>