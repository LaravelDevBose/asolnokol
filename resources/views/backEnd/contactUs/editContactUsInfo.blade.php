@extends('backEnd.master')

@section('title')
Contact Us | Asol Vs Nokol 
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
              <h3 class="box-title">Edit Contact Us Information</h3>
            </div>
            <!-- /.box-header -->
            <h3 class="text-center text-success">{{ Session::get('message') }}</h3>
            <hr/>
            <div>
                <a href="{{ url('/contactUs.insert') }}" class="btn btn-info">Add</a>
                <a href="{{ url('/contactUs.manage') }}" class="btn btn-info">Manage</a>
                <a href="{{ url('/contactUs.view/'.$contactUsInfoById->id) }}" class="btn btn-info">View</a>
            </div>
            <!-- form start -->
            <!-- <form role="form" class="form-horizontal"> -->
            {!! Form::open( [ 'url'=>'/contactUs.update', 'method' =>'POST', 'class' =>'form-horizontal', 'enctype'=>'multipart/form-data', 'name'=> 'editContactUsForm' ] ) !!}
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">House No</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" name="aboutUs" rows="3">{!! $contactUsInfoById->aboutUs !!}</textarea>
                    <input type="hidden" value="{{ $contactUsInfoById->id }}" class="form-control" name="contactUsId">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">House No</label>
                  <div class="col-sm-9">
                    <input type="text" value="{{ $contactUsInfoById->houseNo }}" class="form-control" name="houseNo">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Road No</label>
                  <div class="col-sm-9">
                    <input type="text" value="{{ $contactUsInfoById->roadNo }}" class="form-control" name="roadNo">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Block</label>
                  <div class="col-sm-9">
                    <input type="text" value="{{ $contactUsInfoById->block }}" class="form-control" name="block">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Police Station</label>
                  <div class="col-sm-9">
                    <input type="text" value="{{ $contactUsInfoById->policeStation }}" class="form-control" name="policeStation">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">District</label>
                  <div class="col-sm-9">
                    <input type="text" value="{{ $contactUsInfoById->district }}" class="form-control" name="district">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Postal Code</label>
                  <div class="col-sm-9">
                    <input type="text" value="{{ $contactUsInfoById->postalCode }}" class="form-control" name="postalCode">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Phone No</label>
                  <div class="col-sm-9">
                    <input type="text" value="{{ $contactUsInfoById->phoneNo }}" class="form-control" name="phoneNo">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Email Address</label>
                  <div class="col-sm-9">
                    <input type="email" value="{{ $contactUsInfoById->emailAddress }}" class="form-control" name="emailAddress">
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
   <script>
    document.forms['editContactUsForm'].elements['publicationStatus'].value={{ $contactUsInfoById->publicationStatus }}
</script>

@endsection