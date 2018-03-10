@extends('backEnd.master')

@section('title')
Product-edit|Asol Vs Nokol
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Product Information</h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Product Information</h3>
            </div>
            <div class="col-sm-6">
              <h3 class="text-center text-success">{{ Session::get('success') }}</h3>
                <hr/>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <!-- <form role="form" class="form-horizontal"> -->
            {!! Form::open( [ 'url'=>'/product.update', 'method' =>'POST', 'class' =>'form-horizontal', 'enctype'=>'multipart/form-data','name'=>'editproductForm' ] ) !!}
            <h3 class=" alert alert-info text text-center"> Real Product Ingormation</h3>
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Category Name</label>
                  <div class="col-sm-9">
                    <input type="text" value="{{ $productInfoById->productName }}" class="form-control" name="productName">
                    <input type="hidden" value="{{ $productInfoById->id }}" class="form-control" name="productInfoId">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Category Name</label>
                  <div class="  col-sm-9">
                    <select class="form-control" name="categoryeId">
                        <option value="0">Select Category Name</option>
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
                  <textarea class="form-control" name="identify" rows="10">{{ $productInfoById->identify }}</textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Short Description</label>
                  <div class="col-sm-9">
                    <h5 class="alert-danger">Writte Short Desctiption In 50 words !</h5>
                  <textarea class="form-control" name="shortDescription" rows="3">{!! $productInfoById->shortDescription !!}</textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Long Description</label>
                  <div class="col-sm-9">
                  <textarea class="form-control" name="longDescription" rows="10">{!! $productInfoById->longDescription !!}</textarea>
                  </div>
                </div>
              
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">MenuItem Image</label> 
                  <div class="  col-sm-9">
                    @foreach($realProductImages as $realProductImage)
                      <img src="{{ asset( $realProductImage->imagePath ) }}" alt="{{ $realProductImage->imageName }}" height="150" width="175" >
                      <a href="{{ url('/realproduct.singelImage.delete/'.$realProductImage->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure to delete this'); ">
                        <span class="glyphicon glyphicon-trash"></span>
                      </a>
                    @endforeach
                  <h4 class="text-danger">{{ Session::get('status') }}</h4>
                   {!! Form::file('image[]',['multiple', 'accept'=>'image/*' ]) !!}
                  </div>
                </div>
                <h3 class=" alert alert-info text text-center">Fack Product Ingormation</h3>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Long Description</label>
                  <div class="col-sm-9">
                  <textarea class="form-control" name="fackProductLongDescription" rows="10">{!! $productInfoById->fackProductLongDescription !!}</textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">MenuItem Image</label> 
                  <div class="  col-sm-9">
                    @foreach($fackProductsImages as $fackProductsImage)
                      <img src="{{ asset( $fackProductsImage->fackProductImagePath ) }}" alt="{{ $fackProductsImage->fackProductImageName }}" height="150" width="175" >
                      <a href="{{ url('/fackProduct.singelImage.delete/'.$fackProductsImage->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure to delete this'); ">
                        <span class="glyphicon glyphicon-trash"></span>
                      </a>
                    @endforeach
                  <h4 class="text-danger">{{ Session::get('status') }}</h4>
                   {!! Form::file('fackProductImage[]',['multiple', 'accept'=>'image/*' ]) !!}
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
    document.forms['editproductForm'].elements['publicationStatus'].value={{ $productInfoById->publicationStatus }}
    document.forms['editproductForm'].elements['categoryeId'].value={{ $productInfoById->categoryeId }}
    document.forms['editproductForm'].elements['manufacturerId'].value={{ $productInfoById->manufacturerId }}
</script>


@endsection