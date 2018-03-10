<section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('public/backEnd/images/asolNokol.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::User()->name }}</p>
          <i class="fa fa-circle text-success"></i> Online
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="{{route('dashboard')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <!-- <i class="fa fa-angle-left pull-right"></i> -->
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="{{url('/category')}}">
            <i class="fa fa-laptop"></i>
            <span>Category</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/category.insert')}}"><i class="fa fa-circle-o text-red"></i> Add Categoty</a></li>
            <li><a href="{{url('/category.manage')}}"><i class="fa fa-circle-o text-aqua"></i> Manage Category</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-cogs"></i>
            <span>Manufacturer</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/manufacturer.insert')}}"><i class="fa fa-circle-o text-red"></i> Add Manufacturer</a></li>
            <li><a href="{{url('/manufacturer.manage')}}"><i class="fa fa-circle-o text-aqua"></i>  Manage Manufacturer</a></li>
            
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Product Info</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/product.insert')}}"><i class="fa fa-circle-o text-red"></i>Insert Product Info</a></li>
            <li><a href="{{url('/product.manage')}}"><i class="fa fa-circle-o text-aqua"></i> Manage Product Info</a></li>
            
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-newspaper-o"></i>
            <span>Blog Content</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/blog.content.insert')}}"><i class="fa fa-circle-o text-red"></i>Insert Blog Content</a></li>
            <li><a href="{{url('/blog.content.manage')}}"><i class="fa fa-circle-o text-aqua"></i>Manage Blog Content</a></li>
            
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-youtube-play"></i>
            <span>video Content</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/video.insert')}}"><i class="fa fa-circle-o text-red"></i>Insert Video</a></li>
            <li><a href="{{url('/video.manage')}}"><i class="fa fa-circle-o text-aqua"></i>Manage Video</a></li>
            
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i>
            <span>User Info</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/view.all.user')}}"><i class="fa fa-circle-o text-red"></i>view User Info</a></li>
            <li><a href="{{url('/view.all.message')}}"><i class="fa fa-circle-o text-aqua"></i>View User Mesgs</a></li>
          </ul>
        </li>
        
        <li class="treeview">
          <a href="{{url('/complain.view')}}">
            <i class="fa fa-comments"></i> <span>User Complain</span>
            <span class="pull-right-container">
              <!-- <i class="fa fa-angle-left pull-right"></i> -->
            </span>
          </a>
        </li>

        <!-- <li class="treeview">
          <a href="{{url('/facebook.comment')}}" name="myfram">
            <i class="fa fa-comments"></i> <span>Facebook Comment</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li> -->
        
      </ul>
    </section>