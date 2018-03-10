@extends('backEnd.master')

@section('title')
Dassbord|Asol Vs Nokol
@endsection

@section('content')
 
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <a href="{{url('/view.all.user')}}">
          <div class="col-md-3 col-sm-6 col-xs-12">
          
              <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Total<br>Users</span>
                  <span class="info-box-number">{{ count($users) }}</span>
                </div>
                <!-- /.info-box-content -->
              </div>

              <!-- /.info-box -->
            </div>
          </a>
          <a href="{{url('/product.manage')}}">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Total<br>Products</span>
                  <span class="info-box-number">{{ count($totalProduct) }}</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
          </a>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>
          <a href="{{url('/blog.content.manage')}}">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-newspaper-o"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Total<br>Blogs</span>
                  <span class="info-box-number">{{ count($totalBlogs) }}</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
          </a>
          <a href="{{url('/view.all.message')}}">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o" aria-hidden="true"></i></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Total<br>Reviews</span>
                  <span class="info-box-number">{{ count($totalmsgs) }}</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
          </a>
        <!-- /.col -->
       </div>
      <!-- /.row -->

      {{-- Google Anylytic Report --}}
      <div class="row">
        <!-- Left col -->
        <div class="col-md-6">
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">This Week And List Week Visitors</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              {!! $weeklyChart->render() !!}
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Monthly Visitors History</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              {!! $monthlyReport->render() !!}
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Top Browser History</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              {!! $topBrowser->render() !!}
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">User Bounce History</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              {!! $bounceReport->render() !!}
            </div>
          </div>
        </div>

      </div>

      {{-- Google Anytytic Report End --}}
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-8">
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Latest Orders</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>Sl No.</th>
                    <th>Product Name</th>
                    <th>Category</th>
                    <th>Menufacturer</th>
                    <th>Action</th>

                  </tr>
                  </thead>
                  <tbody>
                    <?php $i=1;?>
                @foreach($latestProducts as $latestProduct)
                  <tr>
                    <td>{{ $i++ }}</td> 
                    <td>{{ $latestProduct->productName }}</td>
                    <td>{{$latestProduct->categoryName }}</td>
                    <td>{{$latestProduct->manufacturerName }}</td>
                    <td>
                      <a href="{{ url('/product.view/'.$latestProduct->id) }}" class="btn btn-info">
                            <span class="glyphicon glyphicon-eye-open"></span>
                          </a>
                    </td>
                  </tr>
                @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="{{ url('/product.insert') }}" class="btn btn-sm btn-info btn-flat pull-left">Insert New Product</a>
              <a href="{{ url('/product.manage') }}" class="btn btn-sm btn-default btn-flat pull-right">View All product</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
          
          <div class="row">
            <div class="col-md-6">
              <!-- USERS LIST -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Latest Users </h3>

                  <div class="box-tools pull-right">
                    <!-- <span class="label label-danger">8 New Members</span> -->
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <ul class="users-list clearfix">
                  <?php $i=1; ?>
                  @foreach($newusers as $newuser )
                    <li>
                   
<!--                       <img src="{{asset('public/backEnd/images/user1-128x128.jpg')}}" alt="User Image">
 -->                      <a class="users-list-name" href="{{ url('/view.singel.user/'.$newuser->id ) }}">{{ $newuser->name }}</a>
                    <?php $date=substr($newuser->created_at, 0, strpos( $newuser->created_at ,' ')) ?>
                      <span class="users-list-date" style="text-align: right; ">{{ $date }}</span>
                    </li>
                  @endforeach  
                  </ul>
                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="{{ url('/view.all.user') }}" class="uppercase">View All Users</a>
                </div>
                <!-- /.box-footer -->
              </div>
              <!--/.box -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.col -->

        <div class="col-md-4">
          <!-- Info Boxes Style 2 -->
          
          <!-- /.info-box -->
          <div class="info-box bg-blue">
            <span class="info-box-icon"><i class="fa fa-facebook" aria-hidden="true"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Facebok Login user</span>
              <span class="info-box-number">{{ count($facebookUsers) }}</span>

              <div class="progress">
                <div class="progress-bar" style="width: 20%"></div>
              </div>
                  <!-- <span class="progress-description">
                    20% Increase in 30 Days
                  </span> -->
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box bg-red">
            <span class="info-box-icon"><i class="fa fa-twitter" aria-hidden="true"></i></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Twitter Login user</span>
              <span class="info-box-number">{{ count($twitterUsers) }}</span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
                  <!-- <span class="progress-description">
                    70% Increase in 30 Days
                  </span> -->
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="fa fa-google-plus" aria-hidden="true"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Google+ Login user</span>
              <span class="info-box-number">{{ count($googleUsers) }}</span>

              <div class="progress">
                <div class="progress-bar" style="width: 40%"></div>
              </div>
                  <!-- <span class="progress-description">
                    40% Increase in 30 Days
                  </span> -->
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="fa fa-user-plus" aria-hidden="true"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Other Login user</span>
              <span class="info-box-number"><?php $otherusers =count($users)-(count($facebookUsers)+count($twitterUsers)+count($googleUsers)); echo $otherusers;  ?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 50%"></div>
              </div>
                  <!-- <span class="progress-description">
                    50% Increase in 30 Days
                  </span> -->
            </div>
            <!-- /.info-box-content -->
          </div>


          <!-- PRODUCT LIST -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Recent Posted Blog </h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="products-list product-list-in-box">
              @foreach($letestBlogs as $letestBlog)
              <a href="{{ url('/blog.content.view/'. $letestBlog->id ) }}">
                <li class="item">
                  <div class="product-img">
                    <img src="{{asset( $letestBlog->imagePath )}}" alt="Product Image">
                  </div>
                  <div class="product-info">
                    <a href="{{ url('/blog.content.view/'. $letestBlog->id ) }}" class="product-title">{{ $letestBlog->blogTitel }}
                      <span class=" pull-right">{{ $letestBlog->authorName }}</span></a>
                        <span class="product-description">
                          {!! $letestBlog->shortDescription !!}
                        </span>
                  </div>
                </li>
                </a>
              @endforeach
                <!-- /.item -->
              </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
              <a href="{{ url('/blog.content.manage') }}" class="uppercase">View All Blogs</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

@endsection