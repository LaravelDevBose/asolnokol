@extends('backEnd.master')

@section('title')
Product-edit|Asol Vs Nokol
@endsection
@section('content')
<div class="content-wrapper">


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
            <h3 ></h3>
            <div class="col-sm-12 box-body">
                <div class="form-group">
                  <label class="col-sm-3 control-label">Category Name</label>
                  <div class="col-sm-9">
                    <input type="text" value="{{ $productInfoById->productName }}" class="form-control" name="productName">
                    <input type="hidden" value="{{ $productInfoById->id }}" class="form-control" name="productInfoId">
                  </div>
                </div>
                <div class="form-group">
                  <label  class="col-sm-3 control-label">Category Name</label>
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
                  <label for="inputEmail3" class="col-sm-3 control-label">Short Description</label>
                  <div class="col-sm-9">
                    <h5 class="alert-danger">Writte Short Desctiption In 50 words !</h5>
                  <textarea class="form-control" name="shortDescription" maxlength="50" rows="3">{!! $productInfoById->shortDescription !!}</textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Long Description</label>
                  <div class="col-sm-9">
                    <textarea class="textarea" id="editor1" name="longDescription" placeholder="Place some text here" style="width: 100%; height: 400px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{!! $productInfoById->longDescription !!}</textarea>
                   
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

<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
  });
</script>
@endsection