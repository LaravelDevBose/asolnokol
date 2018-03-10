@extends('backEnd.master')

@section('title')
Team Profile|Asol Vs Nokol 
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Edit Team Profile Information</h1>
    </section>

    <!-- Main content -->
    <section class="content"> 
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Team Profile</h3>
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
              <a href="{{ url('/team.member.insert') }}" class="btn btn-info">Add</a>
              <a href="{{ url('/team.member.manage') }}" class="btn btn-info">Manage</a>
            </div>
            {!! Form::open( [ 'url'=>'/team.member.update', 'method' =>'POST', 'class' =>'form-horizontal', 'enctype'=>'multipart/form-data','name'=>'editTeamProfileForm' ] ) !!}
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Category Name</label>
                  <div class="col-sm-9">
                    <input type="hidden" value="{{ $teamMemberById->id }}" class="form-control" name="memberId">
                   <input type="text" value="{{ $teamMemberById->memberName }}" class="form-control" name="memberName">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Member Category</label>
                  <div class="  col-sm-9">
                    <select class="form-control" name="memberCategoryeId">
                        <option>Select Member Categorye</option>
                        @foreach($memberCategories as $memberCategory)
                        <option value="{{ $memberCategory->id }}">{{ $memberCategory->categoryTitle }}</option>
                        @endforeach  
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Position</label>
                  <div class="col-sm-9">
                   <input type="text" value="{{ $teamMemberById->position }}" class="form-control" name="position">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label"> Member Image</label> 
                  <div class="  col-sm-9">
                  <style type="text/css"> img{ max-height: 150px; width: 150px; border-radius: 10px; }</style><img src="{{ asset($teamMemberById->image)}}" />
                    <h5 class="text-info">Use Only .PNG Or .JPG Formate </h5>
                    <h4 class="text-danger">{{ Session::get('status') }}</h4>
                    {!! Form::file('image') !!}
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
    document.forms['editTeamProfileForm'].elements['publicationStatus'].value={{ $teamMemberById->publicationStatus }}
    document.forms['editTeamProfileForm'].elements['memberCategoryeId'].value={{ $teamMemberById->memberCategoryeId }}
</script>


@endsection