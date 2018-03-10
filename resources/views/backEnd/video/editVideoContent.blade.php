@extends('backEnd.master')

@section('title')
Video |Asol Vs Nokol 
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Edit Video Information</h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Video</h3>
            </div>
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
              <a href="{{ url('/video.insert') }}" class="btn btn-info">Add</a>
              <a href="{{ url('/video.manage') }}" class="btn btn-info">Manage</a>
            </div>
            {!! Form::open( [ 'url'=>'/video.update', 'method' =>'POST', 'class' =>'form-horizontal','name'=>'editVideoForm' ] ) !!}
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Category Name</label>
                  <div class="col-sm-9">
                   <input type="text" value="{{ $videoById->videoTitle }}" class="form-control" name="videoTitle">
                    <input type="hidden" value="{{ $videoById->id }}" class="form-control" name="videoId">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Resent video : </label>
                  <div class="col-sm-9">
                    <iframe src="{{ $videoById->videoLink }}" frameborder="0" allowfullscreen></iframe>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Icon </label>
                  <div class="col-sm-9">
                    <h6 class="text-danger">YouTube:- <a href="http://youtube.com/" target="_blank">Click here for Youtube</a> </h6>
                    <p class="text text-danger">Use only Id for Youtube, <i class="text text-primary"> Ex:- https://www.youtube.com/watch?v=</i><b class="text text-danger">"re-y6bJ-Mqo"</b></p>
                      <?php $videoId=str_replace("https://www.youtube.com/embed/", "" ,$videoById->videoLink ); ?>
                      <input type="text" name="videoLink" value="{{ $videoId  }}" class="form-control" > 
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Publication Status</label>
                  <div class="  col-sm-9">
                    {!! Form::select('publicationStatus', ['1' => 'Published', '0' => 'Unpublished'], null, ['class'=> 'form-control','placeholder'=> 'Select Publication Status']) !!}
                  </div>
                </div>
                <div class="form-group">
                  
                  <div class="col-sm-offset-3 col-sm-9">
                    {!! Form::submit('Update Video Info',['class'=>'btn btn-success btn-block btn-flat']) !!}
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
    document.forms['editVideoForm'].elements['publicationStatus'].value={{ $videoById->publicationStatus }}
</script>


@endsection