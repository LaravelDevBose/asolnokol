<div class="footer" style=" margin: 20px 0 0 0;">
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
				<div class="clearfix"> </div>
			</div>
			<div class="footer-logo animated wow slideInUp" data-wow-delay=".5s">
				<h2><a href="{{ url('/') }}">Asol <b>Vs</b> Nokol</a></h2>
			</div>
			<div class="copy-right animated wow slideInUp" data-wow-delay=".5s">
				<p>&copy {{ date('Y')}} AsolNokol. All rights reserved | Developed By <a href="https://www.facebook.com/aajob.arup" style="color: #0b9db5 ;">Arup Kumer Bose [ Knight Coder ]</a> <span style="color: #252727 ;"> Design by <a href="http://w3layouts.com/" style="color: #252727 ;">W3layouts</a></span> </p>
			</div>
		</div>
	</div>