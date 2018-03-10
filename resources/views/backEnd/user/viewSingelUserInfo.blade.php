@extends('backEnd.master')

@section('title')
Singel User-Info|Asol Vs Nokol
@endsection
@section('content')
<div class="content-wrapper">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">View full Product Information</h3>
    </div>
    <div>
        <a href="{{ url('/view.all.user')}}" class="btn btn-info">< Back</a>
    </div>
    <!-- /.box-header -->
      <table class="table table-bordered table-striped table-hover dataTable">
         <tr>
            <th></th>
            <th>
                <h3 class="alert alert-danger text text-center">Register User Information</h3>
            </th>        
        </tr>
        <tr>
            <th class="col-md-3">User Id</th>
            <th>{{ $userInfos->id }}</th>
        </tr>
        <tr>
            <th>User Name</th>
            <th>{{ $userInfos->name }}</th>
        </tr>
        <tr>
            <th>Created </th>
            <th>{{ $userInfos->created_at }}</th>
        </tr>
        <tr>
            <th>Email Address </th>
            <th>{{ $userInfos->email }}</th>
        </tr>
        <tr>
            <th>Mobile Number </th>
            <th>{{ $userInfos->phone }}</th>
        </tr>
      </table>     
    <!-- /.box-body -->
    <div>
        <a href="{{ url('/view.all.user')}}" class="btn btn-info">< Back</a>
    </div>
  </div>
</div>
<!-- /.content-wrapper -->

@endsection