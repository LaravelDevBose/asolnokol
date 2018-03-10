@extends('backEnd.master')

@section('title')
Menu|Asol Vs Nokol 
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Edit Main Menu Information</h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Main Menu</h3>
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
              <a href="{{ url('/menu.insert') }}" class="btn btn-info">Add</a>
              <a href="{{ url('/menu.manage') }}" class="btn btn-info">Manage</a>
            </div>
            {!! Form::open( [ 'url'=>'/menu.update', 'method' =>'POST', 'class' =>'form-horizontal','name'=>'editMenuForm' ]) !!}
              <div class="box-body">

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Menu Title</label>
                  <div class="col-sm-9">
                    <input type="hidden" value="{{ $menuById->id }}" class="form-control" name="menuId">
                   <input type="text" value="{{ $menuById->menuName }}" class="form-control" name="menuName">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Menu Position</label>
                  <div class="col-sm-9">
                    <input type="text" value="{{ $menuById->position }}" class="form-control" name="position">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Sub-Menu Title</label>
                  <div class="  col-sm-9">
                    <p class="text text-info">If You Make Dropdown sub menu under it then sete</p>
                    {!! Form::select('childId', ['0' => 'No Sub-menu','1' => 'Category', '2' => 'Menufacture'], null, ['class'=> 'form-control','placeholder'=> 'Select A Sub-Menu Type']); !!}
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Menu Url</label>
                  <div class="  col-sm-9">
                    <p class="text text-info">Select url to match With Name otherwise it doing missbehave</p>
                    {!! Form::select('menuUrl', ['/' => 'For Home','#' => 'No Url', '/blog' => 'For Blog', '/contactUs'=>'For Contact Us', '/team.profile'=>'For Team Profile','/complian'=>'For Complian', '/product-review' => 'For Review',], null, ['class'=> 'form-control','placeholder'=> 'Select Menu Url..']); !!}
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
                    {!! Form::submit('Update Main Menu Information',['class'=>'btn btn-success btn-block btn-flat']) !!}
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
    document.forms['editMenuForm'].elements['publicationStatus'].value={{ $menuById->publicationStatus }}
</script>


@endsection