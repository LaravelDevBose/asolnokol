@extends('backEnd.master')

@section('title')
Banner-Info|Asol Vs Nokol
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Banner Information</h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Insert Banner-Info</h3>
            </div>
            <!-- /.box-header -->
            <h3 class="text-center text-success">{{ Session::get('message') }}</h3>
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
            <div>
              <a href="{{ url('/banner.manage') }}" class="btn btn-info">Manage</a>
            </div>
            <!-- form start -->
            <!-- <form role="form" class="form-horizontal"> -->
            {!! Form::open( [ 'url'=>'/banner.store', 'method' =>'POST', 'class' =>'form-horizontal', 'enctype'=>'multipart/form-data' ] ) !!}
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Company Moto</label>
                  <div class="col-sm-9">
                  <h4 class="text-info">Writte in 50 characters</h4>
                   {!! Form::textarea('companyMoto', null,['class'=>'form-control','rows'=>'4']) !!}
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Company Logo</label> 
                  <div class="  col-sm-9">
                  <h4 class="text-info">Use Only .PNG Or .JPG Formate </h4>
                  <h4 class="text-danger">{{ Session::get('status') }}</h4>
                   {!! Form::file('image') !!}
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Publication Status</label>
                  <div class="  col-sm-9">
                    {!! Form::select('publicationStatus', ['1' => 'Published', '0' => 'Unpublished'], null, ['class'=> 'form-control','placeholder'=> 'Select Publication Status']); !!}
                  </div>
                </div>
                <div class="form-group">
                  
                  <div class="col-sm-offset-3 col-sm-9">
                    {!! Form::submit('Save Banner Info',['class'=>'btn btn-success btn-block btn-flat']) !!}
                  </div>
                </div>
                
              </div>
              <!-- /.box-body -->
              {!!Form::close()!!}
            <!-- </form> -->
          </div>
          <!-- /.box -->
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

@endsection