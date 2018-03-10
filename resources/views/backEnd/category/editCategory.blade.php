@extends('backEnd.master')

@section('title')
Category|Asol Vs Nokol 
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Edit Category Information</h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit category</h3>
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
              <a href="{{ url('/category.insert') }}" class="btn btn-info">Add</a>
              <a href="{{ url('/category.manage') }}" class="btn btn-info">Manage</a>
            </div>
            {!! Form::open( [ 'url'=>'/category.update', 'method' =>'POST', 'class' =>'form-horizontal', 'enctype'=>'multipart/form-data','name'=>'editCategoryForm' ] ) !!}
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Category Name</label>
                  <div class="col-sm-9">
                   <input type="text" value="{{ $categoryById->categoryName }}" class="form-control" name="categoryName">
                    <input type="hidden" value="{{ $categoryById->id }}" class="form-control" name="categoryId">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Short Description</label>
                  <div class="col-sm-9">
                   <textarea class="form-control" name="shortDescription" rows="5">{{ $categoryById -> shortDescription }}</textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Resent Icon : </label>
                  <div class="col-sm-9">
                      <i class=" alert alert-danger {{ $categoryById->icon }}" ></i>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Icon </label>
                  <div class="col-sm-9">
                      <h5 class="text-danger">For Icon  Name:- <a href="http://fontawesome.io/icons/">http://fontawesome.io/icons/</a> </h5>
                      <input type="text" value="{{ $categoryById->icon }}" class="form-control" name="icon"> 
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
                    {!! Form::submit('Update Category Info',['class'=>'btn btn-success btn-block btn-flat']) !!}
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
    document.forms['editCategoryForm'].elements['publicationStatus'].value={{ $categoryById->publicationStatus }}
</script>


@endsection