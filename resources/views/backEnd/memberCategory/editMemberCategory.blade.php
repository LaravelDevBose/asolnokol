@extends('backEnd.master')

@section('title')
Member Category|Asol Vs Nokol 
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Edit Team Member Category Information</h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Team Member Category </h3>
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
              <a href="{{ route('member.category.insert')}}" class="btn btn-info">Add</a>
              <a href="{{ route('member.category.manage')}}" class="btn btn-info">Manage</a>
            </div>
            {!! Form::open( [ 'url'=>'/member.category.update', 'method' =>'POST', 'class' =>'form-horizontal','name'=>'editMemberCategoryForm' ]) !!}
              <div class="box-body">

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Member Category Headding</label>
                  <div class="col-sm-9">
                    <input type="hidden" value="{{ $memberCategoryById->id }}" class="form-control" name="memberCategoryId">
                   <input type="text" value="{{ $memberCategoryById->categoryHeadding }}" class="form-control" name="categoryHeadding">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Member Category Title</label>
                  <div class="col-sm-9">
                   <input type="text" value="{{ $memberCategoryById->categoryTitle }}" class="form-control" name="categoryTitle">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Member Category Position</label>
                  <div class="col-sm-9">
                    <input type="text" value="{{ $memberCategoryById->position }}" class="form-control" name="position">
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
                    {!! Form::submit('Update Member Category Information',['class'=>'btn btn-success btn-block btn-flat']) !!}
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
    document.forms['editMemberCategoryForm'].elements['publicationStatus'].value={{ $memberCategoryById->publicationStatus }}
</script>


@endsection