@extends('backEnd.master')

@section('title')
Product | Asol Vs Nokol
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> Product Information</h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Product Information </h3>
            </div>
            <!-- /.box-header -->
            <h3 class="text-center text-success">{{ Session::get('success') }}</h3>
            <hr/>
            <h3 class="text-center text-danger">{{ Session::get('unsuccess') }}</h3>
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
            <!-- form start -->
            <!-- <form role="form" class="form-horizontal"> -->
            {!! Form::open( [ 'url'=>'/product.store', 'method' =>'POST', 'class' =>'form-horizontal',
            'enctype'=>'multipart/form-data' ] ) !!}

            <h3 class=" alert alert-info text text-center"> Real Product Ingormation</h3>
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Product Name</label>
                  <div class="col-sm-9">
                   {!! Form::text('productName', null,['class'=>'form-control', 'placeholder'=> 'Real Product Name']) !!}
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Category Name</label>
                  <div class="  col-sm-9">
                    <select class="form-control" name="categoryeId">
                        <option value="0">Select Categorye Name</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->categoryName }}</option>
                        @endforeach  
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Company Name</label>
                  <div class="  col-sm-9">
                    <select class="form-control" name="manufacturerId">
                        <option value="0">Select Company Name</option>
                        @foreach($manufacturies as $manufacturer)
                        <option value="{{ $manufacturer->id }}">{{ $manufacturer->manufacturerName }}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Identify Rules</label>
                  <div class="col-sm-9">
                  <h5 class=" alert-danger">Writte Rules in a list</h5>
                   {!! Form::textarea('identify', null,['class'=>'form-control','placeholder'=> 'Writte In a list']) !!}
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Short Description</label>
                  <div class="col-sm-9">
                    <h5 class="alert-danger">Writte Short Desctiption In 50 words !</h5>
                   {!! Form::textarea('shortDescription', null,['class'=>'form-control']) !!}
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Long Description</label>
                  <div class="col-sm-9">
                   {!! Form::textarea('longDescription', null,['class'=>'form-control']) !!}
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Image</label> 
                  <div class="  col-sm-9">
                  <h4 class="text-danger">{{ Session::get('status') }}</h4>
                   {!! Form::file('image[]',['multiple', 'accept'=>'image/*' ]) !!}
                  </div>
                </div>
                <h3 class=" alert alert-danger text text-center">Fack Product Information</h3>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Long Description</label>
                  <div class="col-sm-9">
                   {!! Form::textarea('fackProductLongDescription', null,['class'=>'form-control']) !!}
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Image</label> 
                  <div class="  col-sm-9">
                   {!! Form::file('fackProductImage[]',['multiple', 'accept'=>'image/*' ]) !!}
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
                    {!! Form::submit('Save Product Information',['class'=>'btn btn-success btn-block btn-flat']) !!}
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