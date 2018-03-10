@extends('backEnd.master')

@section('title')
Singel Complain |Asol Vs Nokol
@endsection
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">View Complain</h3>
    </div>
    <div>
        <a href="{{ url('/complain.view')}}" class="btn btn-info">< Back</a>
    </div>
    <!-- /.box-header -->
      <table class="table table-bordered table-striped table-hover dataTable">
        <tr>
            <th>Name </th>
            <th>{{ $singelComplian->name }}</th>
        </tr>
        <tr>
            <th>Sent Time </th>
            <th>{{ $singelComplian->created_at }}</th>
        </tr>
        <tr>
            <th>Email Address </th>
            <th>{{ $singelComplian->email }}</th>
        </tr>
        <tr>
            <th>Subject </th>
            <th>{!! $singelComplian->subject !!}</th>
        </tr>
        <tr>
            <th>Complain</th>
            <th>{!! $singelComplian->message !!}</th>
        </tr>
      </table>     
    <!-- /.box-body -->
    <div>
        <a href="{{ url('/complain.view')}}" class="btn btn-info">< Back</a>
    </div>
  </div>
</div>
<!-- /.content-wrapper -->

@endsection