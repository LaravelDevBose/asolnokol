@extends('backEnd.master')

@section('title')
Blog-edit|Asol Vs Nokol
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Blog Content Information
        
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
              <h3 class="box-title">Edit Blog Content</h3>
            </div>
            
            <h3 class="text-center text-danger">{{ Session::get('unsuccess') }}</h3>
              <hr/>
          <div>
            <a href="{{ url('/blog.content.insert') }}" class="btn btn-info">Add</a>
            <a href="{{ url('/blog.content.manage') }}" class="btn btn-info">Manage</a>
            <a href="{{ url('/blog.content.view/'.$dataById->id) }}" class="btn btn-info">view</a>
          </div>
            <!-- /.box-header -->
            <!-- form start -->
            <!-- <form role="form" class="form-horizontal"> -->
            {!! Form::open( [ 'url'=>'/blog.content.update', 'method' =>'POST', 'class' =>'form-horizontal', 'enctype'=>'multipart/form-data','name'=>'editBlogForm' ] ) !!}
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Author Name</label>
                  <div class="col-sm-9">
                    <input type="text" value="{{ $dataById->authorName }}" class="form-control" name="authorName">
                    <input type="hidden" value="{{ $dataById->id }}" class="form-control" name="blogId">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Blog Title</label>
                  <div class="  col-sm-9">
                    <input type="text" value="{{ $dataById->blogTitel }}" class="form-control" name="blogTitel">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Short Description</label>
                  <div class="col-sm-9">
                    <h5 class="alert-danger">Writte Short Desctiption In 50 words !</h5>
                  <textarea class="form-control" name="shortDescription" rows="3">{!! $dataById->shortDescription !!}</textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Long Description</label>
                  <div class="col-sm-9">
                  <textarea class="form-control" name="longDescription" rows="10">{!! $dataById->longDescription !!}</textarea>
                  </div>
                </div>
              
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Image</label> 
                  <div class="  col-sm-9">
                    @foreach($dataImages as $dataImage)
                      <img src="{{ asset( $dataImage->imagePath ) }}" alt="{{ $dataImage->imageName }}" height="150" width="175" >
                      <a href="{{ url('/blog.content.singelImage.delete/'.$dataImage->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure to delete this'); ">
                        <span class="glyphicon glyphicon-trash"></span>
                      </a>
                    @endforeach
                  <h4 class="text-danger">{{ Session::get('status') }}</h4>
                   {!! Form::file('image[]',['multiple', 'accept'=>'image/*' ]) !!}
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
                    {!! Form::submit('Update Product Information',['class'=>'btn btn-success btn-block btn-flat']) !!}
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
    document.forms['editBlogForm'].elements['publicationStatus'].value={{ $dataById->publicationStatus }}
</script>


@endsection