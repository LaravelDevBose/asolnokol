@extends('backEnd.master')

@section('title')
View Product|Asol Vs Nokol
@endsection
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">View full Product Information</h3>
    </div>
    <div>
        <a href="{{ url('/product.manage')}}" class="btn btn-info">< Back</a>
        <a href="{{ url('/product.edit/'.$productInfos->id) }}" class="btn btn-success">
           <span class="glyphicon glyphicon-edit"></span>
        </a>
    </div>
    <!-- /.box-header -->
      <table class="table table-bordered table-striped table-hover dataTable">
  
        <tr>
            <th class="col-md-3">Product Id</th>
            <th>{{ $productInfos->id }}</th>
        </tr>
        <tr>
            <th>product Name</th>
            <th>{{ $productInfos->productName }}</th>
        </tr>
        <tr>
            <th>Category Name</th>
            <th>{{ $productInfos->categoryName }}</th>
        </tr>
        <tr>
            <th>Company Name</th>
            <th>{{ $productInfos->manufacturerName }}</th>
        </tr>

        <tr>
            <th>Short Description</th>
            <th>{!! $productInfos->shortDescription !!}</th>
        </tr>
        <tr>
            <th>Long Description</th>
            <th>{!! $productInfos->longDescription !!}</th>
        </tr>
        <tr>
            <th> Real Product Images</th>
            <th>
            @foreach($realProductImages as $realProductImage)
                <img src="{{ asset( $realProductImage->imagePath ) }}" alt="{{ $realProductImage->imageName }}" height="150" width="200" >
            @endforeach
            </th>
        </tr>
        
        <tr>
            <th>Publication Status</th>
            <th>{{ $productInfos->publicationStatus == 1 ? 'Published' : 'Unpublished' }}</th>
        </tr>
        
      </table>     
    <!-- /.box-body -->
    <div>
        <a href="{{ url('/product.manage')}}" class="btn btn-info">< Back</a>
        <a href="{{ url('/product.edit/'.$productInfos->id) }}" class="btn btn-success">
           <span class="glyphicon glyphicon-edit"></span>
        </a>
    </div>
  </div>
</div>
<!-- /.content-wrapper -->

@endsection