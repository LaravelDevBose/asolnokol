<!DOCTYPE html>
<html>
<head>
<title>@yield('title')</title>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-108885397-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-108885397-1');
</script>

<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
@include('frontEnd.includes.metaTags')

@yield('shareTag')
<link rel="shortcut icon" href="{{ asset('public/favicon.ico')}}" type="image/x-icon" />
<!--/web-fonts-->
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,600,600italic,300,300italic,700,400italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Wallpoet' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Ubuntu:400,500,700,300' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
<script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=5aa63e4f2c87d4001337db0d&product=social-ab' async='async'></script>
<!--//web-fonts-->

<!-- //for-mobile-apps -->
<link href="{{ asset('public/frontEnd/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="{{ asset('public/frontEnd/css/bootstrap.min.css')}}"><!-- bootstrap-CSS -->
<link rel="stylesheet" href="{{ asset('public/frontEnd/css/bootstrap-select.css')}}"><!-- bootstrap-select-CSS -->
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontEnd/css/zoomslider.css')}}" />
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontEnd/css/component.css')}}" />
<link rel="stylesheet" href="{{ asset('public/frontEnd/css/font-awesome.min.css')}}" /><!-- fontawesome-CSS -->
<link rel="stylesheet" href="{{ asset('public/frontEnd/css/menu_sideslide.css')}}" type="text/css" media="all"><!-- Navigation-CSS -->
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontEnd/css/style.css')}}" />

<script type="text/javascript" src="{{ asset('public/frontEnd/js/modernizr-2.6.2.min.js')}}"></script>
<!-- js -->
<script type="text/javascript" src="{{asset('public/frontEnd/js/jquery.min.js')}}"></script>
<!-- js -->
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
</head>
<body>
<!--FAcebook Comment Plugin SDK Code Start -->


<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1418107188282791',
      xfbml      : true,
      version    : 'v2.9'
    });
    FB.AppEvents.logPageView();
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

<!--FAcebook Comment Plugin SDK Code End -->

<!--/top-section-->

<!-- For only Home page -->

@if( !empty($value) )


<div id="demo-1" data-zs-src='["{{ asset( $bannerImage->image ) }} "]' data-zs-overlay="dots">
	<div class="demo-inner-content">
	<!--bannerContent -->

	@include('frontEnd.includes.bannerContent')

	<!--bannerContent -->

	</div>
</div>

<!-- For normal All pages -->
@else
<style type="text/css">
	.banner-inner {
    background: url( "{{ asset( $bannerImage->image ) }} " ) no-repeat 0px 0px;
    background-size: cover;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    -ms-background-size: cover;
    min-height:100px!important;
}
</style>
<div id="demo-1" class="banner-inner">
	 <div class="banner-inner-dott">
	<!--bannerContent -->

	@include('frontEnd.includes.bannerContent')

	<!--bannerContent -->

	</div>
</div>

@endif

<!-- /menuContent -->

	@include('frontEnd.includes.menuContent')


<!-- //menuContent -->
<!-- //signUpContent -->

@include('frontEnd.includes.signUpContent')

<!-- //signUpContent -->

<!-- /mainContent -->

<!--/ registion message -->

<!--/ registion message -->

@yield('mainContent')

<!-- //mainContent -->


<!-- footerContent -->

@include('frontEnd.includes.footerContent')

<!-- //footerContent End  -->
	

<script src="{{ asset('public/frontEnd/js/jquery-1.11.1.min.js')}}"></script>
<script src="{{ asset('public/frontEnd/js/bootstrap-select.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/frontEnd/js/jquery.zoomslider.min.js')}}"></script>
<script type="text/javascript">
 $(window).load(function() {			
  $("#flexiselDemo").flexisel({
	visibleItems:1,
	animationSpeed: 1000,
	autoPlay: true,
	autoPlaySpeed:1000,    		
	pauseOnHover:true,
	enableResponsiveBreakpoints: true,
	responsiveBreakpoints: { 
		portrait: { 
			changePoint:480,
			visibleItems: 1
		}, 
		landscape: { 
			changePoint:640,
			visibleItems: 1
		},
		tablet: { 
			changePoint:768,
			visibleItems: 1
		}
	}
});
});
</script>
<script type="text/javascript">
 $(window).load(function() {			
  $("#flexiselDemo1").flexisel({
	visibleItems: 4,
	animationSpeed: 1000,
	autoPlay: true,
	autoPlaySpeed: 3000,    		
	pauseOnHover:true,
	enableResponsiveBreakpoints: true,
	responsiveBreakpoints: { 
		portrait: { 
			changePoint:480,
			visibleItems: 1
		}, 
		landscape: { 
			changePoint:640,
			visibleItems: 2
		},
		tablet: { 
			changePoint:768,
			visibleItems: 3
		}
	}
});
});
</script>
<script type="text/javascript" src="{{ asset('public/frontEnd/js/jquery.flexisel.js')}}"></script>
<script src="{{ asset('public/frontEnd/js/bootstrap.js')}}"></script>
 
<!-- required-js-files-->
<link href="{{ asset('public/frontEnd/css/owl.carousel.css')}}" rel="stylesheet">
<script src="{{ asset('public/frontEnd/js/owl.carousel.js')}}"></script>
<script>
	$(document).ready(function() {
	  $("#owl-demo").owlCarousel({
		items : 1,
		lazyLoad : true,
		autoPlay : true,
		navigation : false,
		navigationText :  false,
		pagination : true,
	  });
	});
</script>
<!--//required-js-files-->



</body>
</html>