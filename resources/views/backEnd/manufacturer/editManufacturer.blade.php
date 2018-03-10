@extends('backEnd.master')

@section('title')
Manufacturer|Asol Vs Nokol
@endsection
@section('content') 
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manufacturer Information
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Manufacturer Form</h3>
            </div>
            <div>
              <a href="{{ url('/manufacturer.insert') }}" class="btn btn-info">Add</a>
              <a href="{{ url('/manufacturer.manage') }}" class="btn btn-info">Manage</a>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <!-- <form role="form" class="form-horizontal"> -->
            {!! Form::open( [ 'url'=>'/manufacturer.update', 'method' =>'POST', 'class' =>'form-horizontal', 'enctype'=>'multipart/form-data','name'=>'editManufacturerForm' ] ) !!}
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Companey Name</label>
                  <div class="col-sm-9">
                    <input type="text" value="{{ $manufacturerById->manufacturerName }}" class="form-control" name="manufacturerName">
                    <input type="hidden" value="{{ $manufacturerById->id }}" class="form-control" name="manufacturerId">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Short Description</label>
                  <div class="col-sm-9">
                  <textarea class="form-control" name="shortDescription" rows="5">{{ $manufacturerById -> shortDescription }}</textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Companey Logo</label> 
                  <div class="  col-sm-9">
                  <h4 class="text-danger">{{ Session::get('status') }}</h4>
                    <img src="{{asset( $manufacturerById->image )}}" height="150" width="150" alt="{{$manufacturerById->manufacturerName}}">
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
                    {!! Form::submit('Update Companey Information',['class'=>'btn btn-success btn-block btn-flat']) !!}
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
    document.forms['editManufacturerForm'].elements['publicationStatus'].value={{ $manufacturerById->publicationStatus }}
    
</script>


@endsection