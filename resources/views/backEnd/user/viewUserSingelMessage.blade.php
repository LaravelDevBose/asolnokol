@extends('backEnd.master')

@section('title')
Singel Message |Asol Vs Nokol
@endsection
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">View full Message</h3>
    </div>
    <div>
        <a href="{{ url('/view.all.message')}}" class="btn btn-info">< Back</a>
    </div>
    <!-- /.box-header -->
      <table class="table table-bordered table-striped table-hover dataTable">
        <tr>
            <th class="col-md-3">Message Id</th>
            <th>{{ $singelMessage->id }}</th>
        </tr>
        <tr>
            <th>User Name </th>
            <th>{{ $singelMessage->name }}</th>
        </tr>
        <tr>
            <th>Sent Time </th>
            <th>{{ $singelMessage->created_at }}</th>
        </tr>
        <tr>
            <th>Status </th>
            <th>{{ $singelMessage->status == 1 ? 'viewd' : 'Replied' }}</th>
        </tr>
        <tr>
            <th>Email Address </th>
            <th>{{ $singelMessage->email }}</th>
        </tr>
        <tr>
            <th>Subject </th>
            <th>{!! $singelMessage->subject !!}</th>
        </tr>
        <tr>
            <th>Full Message</th>
            <th>{!! $singelMessage->message !!}</th>
        </tr>

        {{ Form::open(['url'=>'/product.store','method'=>'POST' ]) }}
        <tr>
            <th>Reply</th>
            <th>{!! Form::textarea('identify', null,['class'=>'form-control','placeholder'=> 'Writte In a list']) !!}</th>
        </tr>
        <tr>
            <th></th>
            <th>{!! Form::submit('Save Product Information',['class'=>'btn btn-success btn-block btn-flat']) !!}</th>
        </tr>
        {{ Form::close() }}
      </table>     
    <!-- /.box-body -->
    <div>
        <a href="{{ url('/view.all.message')}}" class="btn btn-info">< Back</a>
    </div>
  </div>
</div>
<!-- /.content-wrapper -->

@endsection