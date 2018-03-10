@extends('backEnd.master')

@section('title')
Blog-Manage|Asol Vs Nokol
@endsection
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  		<div class="box">
    <div class="box-header">
      <h3 class="box-title">Blog Information Table</h3>
    </div>
    <div class="box-body">
      <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
        <div class="row">
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
          <a href="{{ url('/blog.content.insert') }}" class="btn btn-info">Add</a>
        </div>
           <div class="row">
            <div class="col-sm-12">
            	<table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                	<tr>
                    <th>Sl</th>
                    <th>Author Name</th>
                    <th>Blog Title</th>
                    <th>Short Description</th>
                    <th>Publication Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php $i=1; ?>
                  @foreach($datas as $data)
                  <tr> 
                      <th scope="row">{{$i++}}</th>
                      <td>{{ $data->authorName }}</td>
                      <td>{{ $data->blogTitel }}</td>
                      <td>{!! $data->shortDescription !!}</td>
                      <td>{{ $data->publicationStatus == 1 ? 'Published' : 'Unpublished' }}</td>
                      <td>
                          <a href="{{ url('/blog.content.view/'.$data->id) }}" class="btn btn-info">
                            <span class="glyphicon glyphicon-info-sign"></span>
                          </a>
                          <a href="{{ url('/blog.content.edit/'.$data->id) }}" class="btn btn-success">
                              <span class="glyphicon glyphicon-edit"></span>
                          </a>
                          <a href="{{ url('/blog.content.delete/'.$data->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure to delete this'); ">
                              <span class="glyphicon glyphicon-trash"></span>
                          </a>
                      </td> 
                  </tr>
                    @endforeach
                </tbody>
                <tfoot>
                	<tr>
                    <th>Sl</th>
                    <th>Author Name</th>
                    <th>Blog Title</th>
                    <th>Short Description</th>
                    <th>Publication Status</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
              </table>
     	      </div>
          </div>
          <div class="row">
            <div class="col-md-5">{{ $datas->links() }}</div>
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