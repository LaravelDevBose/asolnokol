@extends('backEnd.master')

@section('title')
Contact Us| Asol Vs Nokol
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Contact Us Information</h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Contact Us Info</h3>
            </div>
            <!-- /.box-header -->
            <h3 class="text-center text-success">{{ Session::get('success') }}</h3>
            <hr/>
            <div>
              <a href="{{ url('/contactUs.manage') }}" class="btn btn-info">Manage</a>
            </div>
            <!-- form start -->
            <!-- <form role="form" class="form-horizontal"> -->
            {!! Form::open( [ 'url'=>'/contactUs.store', 'method' =>'POST', 'class' =>'form-horizontal', 'enctype'=>'multipart/form-data' ] ) !!}
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">About Us</label>
                  <div class="col-sm-9">
                   {!! Form::textarea('aboutUs', null,['class'=>'form-control', 'placeholder'=> 'About Us ']) !!}
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">House No</label>
                  <div class="col-sm-9">
                   {!! Form::text('houseNo', null,['class'=>'form-control', 'placeholder'=> 'House No']) !!}
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Road No</label>
                  <div class="col-sm-9">
                   {!! Form::text('roadNo', null,['class'=>'form-control', 'placeholder'=> 'Road No']) !!}
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Block</label>
                  <div class="col-sm-9">
                   {!! Form::text('block', null,['class'=>'form-control', 'placeholder'=> 'Block']) !!}
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Police Station</label>
                  <div class="col-sm-9">
                   {!! Form::text('policeStation', null,['class'=>'form-control', 'placeholder'=> 'Police Station']) !!}
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">District</label>
                  <div class="col-sm-9">
                   {!! Form::text('district', null,['class'=>'form-control', 'placeholder'=> 'District']) !!}
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Postal Code</label>
                  <div class="col-sm-9">
                   {!! Form::text('postalCode', null,['class'=>'form-control','placeholder'=> 'Postal Code']) !!}
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Phone No</label>
                  <div class="col-sm-9">
                   {!! Form::text('phoneNo', null,['class'=>'form-control','placeholder'=> 'Phone No']) !!}
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Email Address</label>
                  <div class="col-sm-9">
                   {!! Form::email('emailAddress', null,['class'=>'form-control', 'placeholder'=> 'Email Address']) !!}
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
                    {!! Form::submit('Save Contact Us Info',['class'=>'btn btn-success btn-block btn-flat']) !!}
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