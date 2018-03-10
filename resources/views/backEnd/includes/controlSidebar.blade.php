<aside class="control-sidebar control-sidebar-dark">
  <!-- Create the tabs -->
  <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
    <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
  </ul>
  <!-- Tab panes -->
  <div class="tab-content">
    <!-- Home tab content -->
    <div class="tab-pane" id="control-sidebar-home-tab">
      <h3 class="control-sidebar-heading">Recent Activity</h3>
      <section class="sidebar">
      <ul class="sidebar-menu">
        <li class="treeview">
          <a href="javascript:void(0)">
            <i class="fa fa-laptop"></i>
            <span>Banner Info</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/banner.insert')}}"><i class="fa fa-circle-o text-red"></i> Add Banner Info</a></li>
            <li><a href="{{url('/banner.manage')}}"><i class="fa fa-circle-o text-aqua"></i> Manage Banner Info</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="javascript:void(0)">
            <i class="fa fa-laptop"></i>
            <span>Menu Content</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/menu.insert')}}"><i class="fa fa-circle-o text-red"></i> Add Main Menu</a></li>
            <li><a href="{{url('/menu.manage')}}"><i class="fa fa-circle-o text-aqua"></i> Manage Main Menu</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="javascript:void(0)">
            <i class="fa fa-laptop"></i>
            <span>Team Profile</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/team.member.insert')}}"><i class="fa fa-circle-o text-red"></i> Add Team Member</a></li>
            <li><a href="{{url('/team.member.manage')}}"><i class="fa fa-circle-o text-aqua"></i> Manage Team Member</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="javascript:void(0)">
            <i class="fa fa-laptop"></i>
            <span>Member Category </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('member.category.insert')}}"><i class="fa fa-circle-o text-red"></i> Add Member Category</a></li>
            <li><a href="{{ route('member.category.manage')}}"><i class="fa fa-circle-o text-aqua"></i> Manage Member Category</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="javascript:void(0)">
            <i class="fa fa-laptop"></i>
            <span>Contact Us</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/contactUs.insert')}}"><i class="fa fa-circle-o text-red"></i> Add Contact Us Info</a></li>
            <li><a href="{{url('/contactUs.manage')}}"><i class="fa fa-circle-o text-aqua"></i> Manage Contact Us Info</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="{{route('register.admin')}}">
            <i class="fa fa-user"></i> <span> New Admin</span>
            <span class="pull-right-container"></span>
          </a>
        </li>
      </ul>
      <!-- /.control-sidebar-menu -->
    </section>
    </div>
  </div>
</aside>