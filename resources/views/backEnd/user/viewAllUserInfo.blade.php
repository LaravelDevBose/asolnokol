@extends('backEnd.master')

@section('title')
User Info|Asol Vs Nokol
@endsection
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <div class="box">
    <div class="box-header">
      <h3 class="box-title">Registerd User Info Table With Full Features</h3>
    </div>
    <div class="box-body">
      <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
        <div class="row">
          <div class="col-sm-6 col-sm-offset-6">
            <div id="example1_filter" class="dataTables_filter">
              <label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="example1"></label>
            </div>
          </div>
        </div>
           <div class="row">
            <div class="col-sm-12">
              <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                  <tr>
                    <th>Sl</th>
                    <th>User Name</th>
                    <th>Email Address</th>
                    <th>Phone Number</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php $i=1; ?>
                  @foreach($usersInfo as $userInfo)
                  <tr> 
                      <th scope="row">{{$i++}}</th>
                      <td>{{ $userInfo->name }}</td>
                      <td>{{ $userInfo->email }}</td>
                      <td>{{ $userInfo->phone }}</td>
                      <td>
                          <a href="{{ url('/view.singel.user/'.$userInfo->id) }}" class="btn btn-info">
                            <span class="glyphicon glyphicon-eye-open"></span>
                          </a>
                      </td> 
                  </tr>
                    @endforeach
                 
                </tbody>
                <tfoot>
                  <tr>
                    <th>Sl</th>
                    <th>User Name</th>
                    <th>Email Address</th>
                    <th>Phone Number</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
          <div class="row">
            <div class="col-md-5">{{ $usersInfo->links() }}</div>
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
