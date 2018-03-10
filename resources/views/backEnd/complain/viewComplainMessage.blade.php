@extends('backEnd.master')

@section('title')
view Complain |Asol Vs Nokol
@endsection
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <div class="box">
    <div class="box-header">
      <h3 class="box-title">Complian Message Area</h3>
    </div>
    <div class="box-body">
      <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
         <div class="row">
          <div class="col-sm-12">
            <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
              <thead>
                <tr>
                  <th>Sl</th>
                  <th>User Name</th>
                  <th>Email Address</th>
                  <th>Subject</th>
                  <th>Message</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              <?php $i=1; ?>
                @foreach($complains as $complain)
                <tr> 
                    <th scope="row">{{$i++}}</th>
                    <td>{{$complain->name }}</td>
                    <td>{{$complain->email }}</td>
                    <td>{{$complain->subject }}</td>
                    <td>{{$complain->message }}</td>
                    <td>
                        <a href="{{ url('/complain.singel/'.$complain->id )}}" class="btn btn-info">
                          <span class="glyphicon glyphicon-eye-open"></span>
                        </a>
                    </td> 
                </tr>
                  @endforeach
               
              </tbody>
              <tfoot>
                <tr>
                  <<th>Sl</th>
                  <th>User Name</th>
                  <th>Email Address</th>
                  <th>Subject</th>
                  <th>Message</th>
                  <th>Action</th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
        <div class="row">
          <div class="col-md-5">{{ $complains->links() }}</div>
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