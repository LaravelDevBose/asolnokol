@extends('backEnd.master')

@section('title')
Contact Us | Asol Vs Nokol
@endsection
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  		<div class="box">
            <div class="box-header">
              <h3 class="box-title">Contact Us Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
           <div class="box-body">
             <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row">
             	<div class="col-sm-6">
             		<h3 class="text-center text-success">{{ Session::get('success') }}</h3>
                <hr/>
             	</div>
             	<div class="col-sm-6">
             	<div id="example1_filter" class="dataTables_filter">
             		<label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="example1"></label>
             	</div>
             </div>
            </div>
            <div>
              <a href="{{ url('/contactUs.insert') }}" class="btn btn-info">Add</a>
            </div>
           <div class="row">
            <div class="col-sm-12">
            	<table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                	<tr>
                    <th>Sl</th>
                    <th>About Us</th>
                    <th>Phone No</th>
                    <th>Email Address</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php $i=1; ?>
                  @foreach($contactUsInfos as $contactUsInfo)
                  <tr> 
                      <th scope="row">{{$i++}}</th>
                      <td>{!! $contactUsInfo->aboutUs !!}</td>
                      <td>{{ $contactUsInfo->phoneNo }}</td>
                      <td>{{ $contactUsInfo->emailAddress }}</td>
                      <td>{{ $contactUsInfo->publicationStatus == 1 ? 'Published' : 'Unpublished' }}</td> 
                      <td>
                          <a href="{{ url('/contactUs.view/'.$contactUsInfo->id ) }}" class="btn btn-info">
                            <span class="glyphicon glyphicon-info-sign"></span>
                          </a>
                          <a href="{{ url('/contactUs.edit/'.$contactUsInfo->id ) }}" class="btn btn-success">
                              <span class="glyphicon glyphicon-edit"></span>
                          </a>
                          <a href="{{ url('/contactUs.delete/'.$contactUsInfo->id ) }}" class="btn btn-danger" onclick="return confirm('Are you sure to delete this'); ">
                              <span class="glyphicon glyphicon-trash"></span>
                          </a>
                      </td> 
                  </tr>
                    @endforeach
                </tbody>
                <tfoot>
                	<tr>
                    <th>Sl</th>
                    <th>About Us</th>
                    <th>Phone No</th>
                    <th>Email Address</th>
                    <th>Action</th>
                	</tr>
                </tfoot>
              </table>
     	      </div>
          </div>
      </div>
    </div>
  <!-- /.box-body -->
  </div>
</div>
  <!-- /.content-wrapper -->

<script>
  $(function () {
  $("#example1").DataTable();
  $('#example2').DataTable({
  "paging": true,
  "lengthChange": false,
  "searching": false,
  "ordering": true,
  "info": true,
  "autoWidth": false
  });
  });
</script>

@endsection