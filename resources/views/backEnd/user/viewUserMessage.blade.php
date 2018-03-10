@extends('backEnd.master')

@section('title')
view Message |Asol Vs Nokol
@endsection
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <div class="box">
    <div class="box-header">
      <h3 class="box-title">{{ $viewTitle }}</h3>
    </div>
    <div class="box-body">
      <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
        <div class="row">
        <div class="col-sm-3 col-md-3">
            <div id="example1_filter" class="dataTables_filter">
              <a href="{{ url('/view.message.unread')}}" class="text text-info"><button class="btn btn-info btn-flat">UnRead</button></a>
              <a href="{{ url('/view.message.unreplyed')}}" class="text text-info"><button class="btn btn-info btn-flat">UnReplyed</button></a>
            </div>
          </div>
          <div class="col-sm-6 col-md-6 col-md-offset-6">
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
                    <th>Message</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php $i=1; ?>
                  @foreach($usersMessages as $userMessage)
                  <tr> 
                      <th scope="row">{{$i++}}</th>
                      <td>{{$userMessage->name }}</td>
                      <td>{{$userMessage->subject }}</td>
                      <?php $value=$userMessage->status; 
                        if($value=='0'){
                            $status ='Unread';
                          }else if($value == '1'){ 
                            $status= 'viewd'; 
                          }else{ 
                            $status = 'Replied';
                          }
                        ?>
                      <td>{{ $status }}</td> 
                      <td>
                          <a href="{{ url('/view.message.singel/'.$userMessage->id )}}" class="btn btn-info">
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
            <div class="col-md-5">{{ $usersMessages->links() }}</div>
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