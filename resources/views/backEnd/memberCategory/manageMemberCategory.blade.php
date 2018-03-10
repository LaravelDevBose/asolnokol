@extends('backEnd.master')

@section('title')
Member memberCategoy|Asol Vs Nokol
@endsection
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <div class="box">
          <div class="box-header">
            <h3 class="box-title">Data Table With Full Features</h3>
          </div>
            <!-- /.box-header -->
           <div class="box-body">
             <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row">
              <div class="col-sm-6">
                <h3 class="text-center text-success">{{ Session::get('message') }}</h3>
                <hr/>
              </div>
              <div class="col-sm-6">
              <div id="example1_filter" class="dataTables_filter">
                <label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="example1"></label>
              </div>
             </div>
            </div>
            <div>
              <a href="{{ route('member.category.insert')}}" class="btn btn-info">Add</a>
            </div>
           <div class="row">
            <div class="col-sm-12">
              <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                  <thead>
                  <tr>
                      <th>ID</th> 
                      <th>Headding</th>
                      <th>Title</th>
                      <th>Position</th>
                      <th>Publication Status</th>
                      <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $i='1'; ?>
                    @foreach($memberCategories as $memberCategoy)
                      <tr> 
                          <th scope="row">{{ $i++ }}</th>
                          <td>{{ $memberCategoy->categoryHeadding }}</td>
                          <td>{{ $memberCategoy->categoryTitle }}</td>
                          <td>{!! $memberCategoy->position !!}</td>
                          <td>{{ $memberCategoy->publicationStatus == 1 ? 'Published' : 'Unpublished' }}</td> 
                          <td>
                              <a href="{{url('/member.category.edit/'.$memberCategoy->id) }}" class="btn btn-success">
                                  <span class="glyphicon glyphicon-edit"></span>
                              </a>
                              <a href="{{ url('/member.category.delete/'.$memberCategoy->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure to delete this'); ">
                                  <span class="glyphicon glyphicon-trash"></span>
                              </a>
                          </td> 
                      </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                    <th>ID</th>
                    <th>memberCategoy Name</th>
                    <th>Short Description</th>
                    <th>Icon</th>
                    <th>Publication Status</th>
                    <th>Action</th>
                  </tfoot>
              </table>
            </div>
          </div>
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