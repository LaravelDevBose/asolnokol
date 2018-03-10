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
        <a href="{{ url('/contactUs.insert') }}" class="btn btn-info">Add</a>
        <a href="{{ url('/contactUs.manage') }}" class="btn btn-info">Manage</a>
        <a href="{{ url('/contactUs.edit/'.$contactUsInfo->id) }}" class="btn btn-info">Edit</a>
    </div>
    <!-- /.box-header -->
      <table class="table table-bordered table-striped table-hover dataTable">
         <tr>
            <th></th>
            <th>
                <h3 class="alert alert-danger text text-center">Contact Us Information</h3>
            </th>        
        </tr>
        <tr>
            <th class="col-md-3">Product Id</th>
            <th>{{ $contactUsInfo->id }}</th>
        </tr>
        <tr>
            <th>About Us</th>
            <th>{!! $contactUsInfo->aboutUs !!}</th>
        </tr>
        <tr>
            <th>House No</th>
            <th>{{ $contactUsInfo->houseNo }}</th>
        </tr>
        <tr>
            <th>Road No </th>
            <th>{{ $contactUsInfo->roadNo }}</th>
        </tr>
        <tr>
            <th>Block </th>
            <th>{!! $contactUsInfo->block !!}</th>
        </tr>
        <tr>
            <th>Police Station</th>
            <th>{!! $contactUsInfo->policeStation !!}</th>
        </tr>
        <tr>
            <th>District </th>
            <th>{!! $contactUsInfo->district !!}</th>
        </tr>
        <tr>
            <th>Postal Code</th>
            <th>{!! $contactUsInfo->postalCode !!}</th>
        </tr>
        <tr>
            <th>Phone No</th>
            <th>{!! $contactUsInfo->phoneNo !!}</th>
        </tr>
        <tr>
            <th>Email Address</th>
            <th>{!! $contactUsInfo->emailAddress !!}</th>
        </tr>
        <tr>
            <th>Publication Status</th>
            <th>{!! $contactUsInfo->publicationStatus !!}</th>
        </tr>
      </table>     
    <!-- /.box-body -->
    <div>
        <a href="{{ url('/contactUs.insert') }}" class="btn btn-info">Add</a>
        <a href="{{ url('/contactUs.manage') }}" class="btn btn-info">Manage</a>
        <a href="{{ url('/contactUs.edit/'.$contactUsInfo->id) }}" class="btn btn-info">Edit</a>
    </div>
  </div>
</div>
<!-- /.content-wrapper -->

@endsection