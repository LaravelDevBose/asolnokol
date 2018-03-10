@extends('backEnd.master')

@section('title')
Manu|Asol Vs Nokol
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
              <a href="{{ url('/menu.insert') }}" class="btn btn-info">Add</a>
            </div>
           <div class="row">
            <div class="col-sm-12">
            	<table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                	<thead>
                	<tr>
                      <th>Sl No</th> 
                      <th>Menu Title</th>
                      <th>Menu Position</th>
                      <th>DropDown Area</th>
                      <th>Pages Url</th>
                      <th>Publication Status</th>
                      <th>Action</th>
                  </tr>
	                </thead>
	                <tbody>
                    <?php $i='1'; ?>
  	                @foreach($menusInfo as $menuInfo)
      				        <tr> 
      				            <th scope="row">{{ $i++ }}</th>
                          <td>{{ $menuInfo->menuName }}</td>
      				            <td>{{ $menuInfo->position }}</td>
                          <td>
                            <?php 
                              if($menuInfo->childId == 0){ 
                                  echo "NO Sub-Menu";
                                }

                              else if($menuInfo->childId == 1){ 
                                  echo "Category Type";
                                }
                                else{ echo " Menufacture Type";
                                }
                            ?>      
                          </td>
                          <td>
                            <?php 
                              if($menuInfo->menuUrl === '/'){ 
                                  echo "Home Page Url";
                                }else if($menuInfo->menuUrl === '#'){ 
                                  echo "NO Url";
                                }else if($menuInfo->menuUrl === '/blog'){ 
                                  echo "Blog Page Url";
                                }else if($menuInfo->menuUrl === '/contactUs'){ 
                                  echo "Contact Us Page Url";
                                }else if($menuInfo->menuUrl === '/team.profile'){ 
                                  echo " Tream Profile Page Url";
                                }
                            ?>      
                          </td>  

      				            <td>{{ $menuInfo->publicationStatus == 1 ? 'Published' : 'Unpublished' }}</td> 
      				            <td>
      				                <a href="{{ url('/menu.edit/'.$menuInfo->id) }}" class="btn btn-success">
      				                    <span class="glyphicon glyphicon-edit"></span>
      				                </a>
      				                <a href="{{ url('/menu.delete/'.$menuInfo->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure to delete this'); ">
      				                    <span class="glyphicon glyphicon-trash"></span>
      				                </a>
      				            </td> 
      				        </tr>
                    @endforeach
                  </tbody>
                  <tfoo>
                    <th>Sl No</th> 
                    <th>Menu Title</th>
                    <th>Menu Position</th>
                    <th>DropDown Area</th>
                    <th>Pages Url</th>
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