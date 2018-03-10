@extends('backEnd.master')

@section('title')
View Product|Asol Vs Nokol
@endsection
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Blog Content With Full Features</h3>
    </div>
    <div>
        <a href="{{ url('/blog.content.insert') }}" class="btn btn-info">Add</a>
        <a href="{{ url('/blog.content.manage') }}" class="btn btn-info">Manage</a>
        <a href="{{ url('/blog.content.edit/'.$dataById->id) }}" class="btn btn-info">Edit</a>
    </div>
    <!-- /.box-header -->
      <table class="table table-bordered table-striped table-hover dataTable">
        <tr>
            <th class="col-md-3">Blog Id</th>
            <th>{{ $dataById->id }}</th>
        </tr>
        <tr>
            <th>Author Name</th>
            <th>{{ $dataById->authorName }}</th>
        </tr>
        <tr>
            <th>Blog Title</th>
            <th>{{ $dataById->blogTitel }}</th>
        </tr>
        <tr>
            <th>Short Description</th>
            <th>{!! $dataById->shortDescription !!}</th>
        </tr>
        <tr>
            <th>Long Description</th>
            <th>{!! $dataById->longDescription !!}</th>
        </tr>
        <tr>
            <th>Publication Status</th>
            <th>{{ $dataById->publicationStatus == 1 ? 'Published' : 'Unpublished' }}</th>
        </tr>
        <tr>
            <th>Blog Images</th>
            <th>
            @foreach($dataImages as $dataImage)
                <img src="{{ asset( $dataImage->imagePath ) }}" alt="{{ $dataImage->imageName }}" height="150" width="200" >
            @endforeach
            </th>
        </tr>
      </table>     
    <!-- /.box-body -->
    <div>
        <a href="{{ url('/blog.content.insert') }}" class="btn btn-info">Add</a>
        <a href="{{ url('/blog.content.manage') }}" class="btn btn-info">Manage</a>
        <a href="{{ url('/blog.content.edit/'.$dataById->id) }}" class="btn btn-info">Edit</a>
    </div>
  </div>
</div>
<!-- /.content-wrapper -->

@endsection