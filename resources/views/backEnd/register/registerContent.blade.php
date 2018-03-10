<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Registration</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{asset('public/backEnd/bootstrap/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('public/backEnd/dist/css/CodeHunter.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('public/backEnd/plugins/iCheck/square/blue.css')}}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="{{url('/')}}">Asol<b> Vs </b> Nokol </a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Register a new membership</p>
    @if($errors->any())
        <div class="well">
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(Session::get('status'))
    <div>
      <h3 class="text-center text-success">{{Session::get('status')}}</h3>
    </div>
    @endif
    
    {!! Form::Open(['url'=>'/admin.register','method'=>'POST']) !!}
      <div class="form-group has-feedback">
      {!! Form::text('name', null,['class'=>'form-control', 'placeholder'=> ' Full name']) !!}
        
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        {!! Form::email('email', null,['class'=>'form-control', 'placeholder'=> ' Email']) !!}
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
      {!! Form::text('phoneNo', null,['class'=>'form-control', 'placeholder'=> ' Phone No']) !!}
        
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        {!! Form::password('password', ['class'=>'form-control', 'placeholder'=> 'Password']) !!}
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        {!! Form::password('password_confirmation', ['class'=>'form-control', 'placeholder'=> 'Password']) !!}
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-5">
		<a href="{{ route('dashboard') }} " class="btn btn-info btn-block btn-flat " >DassBord</a>
        </div>
        <!-- /.col -->
        <div class="col-xs-7">
        {!! Form::submit('Register',['class'=>'btn btn-success btn-block btn-flat']) !!}
          
        </div>
        <!-- /.col -->
      </div>
    {!!Form::close()!!}

    <!-- <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
        Google+</a>
    </div> -->

    <!--  //<a href="{{route('admin')}}" class="text-center">I already have a membership</a> -->
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
<!-- jQuery 2.2.3 -->
<script src="{{asset('public/backEnd/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{asset('public/backEnd/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- iCheck -->
<script src="{{asset('public/backEnd/plugins/iCheck/icheck.min.js')}}"></script>

</body>
</html>
