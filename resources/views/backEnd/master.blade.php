<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
  <link rel="shortcut icon" href="{{ asset('public/favicon.ico')}}" type="image/x-icon" />
{!! Charts::assets() !!}
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{asset('public/backEnd/bootstrap/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{asset('public/backEnd/plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}">
    <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('public/backEnd/plugins/datatables/dataTables.bootstrap.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('public/backEnd/dist/css/CodeHunter.min.css')}}">
  <!-- backEndLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('public/backEnd/dist/css/skins/_all-skins.min.css')}}">
  <script src="//cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({selector: 'textarea'});</script>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  @include('backEnd.includes.headerContent')
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    @include('backEnd.includes.sidebarContent')
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  @yield('content')
  <!-- /.content-wrapper -->
   @include('backEnd.includes.footer')
  <!-- Control Sidebar -->

   @include('backEnd.includes.controlSidebar')
  <!-- /.control-sidebar -->


  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="{{asset('public/backEnd/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{asset('public/backEnd/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('public/backEnd/plugins/fastclick/fastclick.js')}}"></script>
<!-- backEndLTE App -->
<script src="{{asset('public/backEnd/dist/js/app.min.js')}}"></script>
<!-- DataTables -->
<script src="{{asset('public/backEnd/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/backEnd/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('public/backEnd/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{asset('public/backEnd/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('public/backEnd/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- SlimScroll 1.3.0 -->
<script src="{{asset('public/backEnd/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- ChartJS 1.0.1 -->
<script src="{{asset('public/backEnd/plugins/chartjs/Chart.min.js')}}"></script>
<!-- backEndLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('public/backEnd/dist/js/pages/dashboard2.js')}}"></script>
<!-- backEndLTE for demo purposes -->
<script src="{{asset('public/backEnd/dist/js/demo.js')}}"></script>
<link href="{{asset('public/backEnd/dist/css/fontawesome-iconpicker.min.css')}}" rel="stylesheet">
<script src="{{asset('public/backEnd/dist/js/fontawesome-iconpicker.min.js')}}"></script>


<script>
  $(function(){
     _formatMenuIconInput();
      $('.dd').nestable({
          maxDepth: 2
      });
      $('.toggle-menu-options').on('click', function(e) {
          e.preventDefault();
          menu_id = $(this).parents('li').data('id');
          if ($(this).hasClass('main-item-options')) {
              $(this).parents('li').find('.main-item-options[data-menu-options="' + menu_id + '"]').slideToggle();
          } else {
              $(this).parents('li').find('.sub-item-options[data-menu-options="' + menu_id + '"]').slideToggle();
          }
      });

        $('.icon-picker').iconpicker()
    .on({'iconpickerSetSourceValue': function(e){
        _formatMenuIconInput(e);
    }})
  });

  function save_menu() {
      var items = $('.dd.active').find('li.main');
      $.each(items, function() {
          var main_menu = $(this);
          var name = $(this).find('.main-item-options input.main-item-name').val();
          var url = $(this).find('.main-item-options input.main-item-url').val();
          var icon = $(this).find('.main-item-icon').val();
          main_menu.data('name', name);
          main_menu.data('url', url);
          main_menu.data('permission', $(this).data('permission'));
          main_menu.data('icon', icon);

      });

      var sub_items = $('.dd.active li.sub-items');
      $.each(sub_items, function() {
          var sub_item = $(this);
          var name = $(this).find('.sub-item-options input.sub-item-name').val();
          var url = $(this).find('.sub-item-options input.sub-item-url').val();
          var icon = $(this).find('.main-item-icon').val();
          sub_item.data('name', name);
          sub_item.data('url', url);
          sub_item.data('permission', $(this).data('permission'));
          sub_item.data('icon', icon);
      });

      var setup_menu_active = $('.dd.active').nestable('serialize');
      /* Inactive */
      var items_inactive = $('.dd.inactive').find('li.main');
      $.each(items_inactive, function() {
          var main_menu = $(this);
          var name = $(this).find('.main-item-options input.main-item-name').val();
          var url = $(this).find('.main-item-options input.main-item-url').val();
          var icon = $(this).find('.main-item-icon').val();
          main_menu.data('name', name);
          main_menu.data('url', url);
          main_menu.data('permission', $(this).data('permission'));
          main_menu.data('icon', icon);

      });

      var sub_items = $('.dd.inactive li.sub-items');
      $.each(sub_items, function() {
          var sub_item = $(this);
          var name = $(this).find('.sub-item-options input.sub-item-name').val();
          var url = $(this).find('.sub-item-options input.sub-item-url').val();
          var icon = $(this).find('.main-item-icon').val();
          sub_item.data('name', name);
          sub_item.data('url', url);
          sub_item.data('permission', $(this).data('permission'));
          sub_item.data('icon', icon);
      });

      var setup_menu_inactive = $('.dd.inactive').nestable('serialize');
      var data = {};
      data.active = setup_menu_active;
      data.inactive = setup_menu_inactive;
      $.post(admin_url + 'utilities/update_setup_menu', data).done(function() {
          window.location.reload();
      })

  }
</script>


</body>
</html>
