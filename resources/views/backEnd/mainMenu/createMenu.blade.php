@extends('backEnd.master')

@section('title')
Menu|Asol Vs Nokol
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Main Menu Information</h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Insert Main Menu</h3>
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
              <a href="{{ url('/menu.manage') }}" class="btn btn-info">Manage</a>
            </div>
            <!-- form start -->
            <!-- <form role="form" class="form-horizontal"> -->
            {!! Form::open( [ 'url'=>'/menu.store', 'method' =>'POST', 'class' =>'form-horizontal',] ) !!}
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Menu Title</label>
                  <div class="col-sm-9">
                   {!! Form::text('menuName', null,['class'=>'form-control', 'placeholder'=> 'Main Menu Name']) !!}
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Menu Title Position</label>
                  <div class="col-sm-9">
                   {!! Form::text('position', null,['class'=>'form-control', 'placeholder'=> 'Main Menu Position']) !!}
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Sub- Menu Area</label>
                  <div class="  col-sm-9">
                    <p class="text text-info">If You Make Dropdown sub menu under This Menu then Select</p>
                    {!! Form::select('childId', ['0' => 'No Sub-menu','1' => 'Category', '2' => 'Menufacture'], null, ['class'=> 'form-control','placeholder'=> 'Select A Sub-Menu Area..']); !!}
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Menu Url</label>
                  <div class="  col-sm-9">
                    <p class="text text-info">Select url to match With Name otherwise it doing misbehave (with Out Dropdown)</p>
                    {!! Form::select('menuUrl', ['#' => 'No Url','/' => 'For Home', '/blog' => 'For Blog', '/contactUs'=>'For Contact Us', '/team.profile'=>'For Team Profile', '/complian'=>'For Complian', '/product-review' => 'For Review',], null, ['class'=> 'form-control','placeholder'=> 'Select Menu Url..']); !!}
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
                    {!! Form::submit('Save Main Menu Information',['class'=>'btn btn-success btn-block btn-flat']) !!}
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