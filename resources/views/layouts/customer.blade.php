<!DOCTYPE html>
<html lang="en" class="" style="height: auto;">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Client Billing History </title>
    <link rel="icon" href="{{asset('../images/logo.jpg')}}" style="border-radius: 50%;"/>
    <!-- Google Font: Source Sans Pro -->
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback"> -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('../fontawesome-free/css/all.min.css')}}">
   
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{asset('../tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
      <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('../datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('../datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('../datatables-buttons/css/buttons.bootstrap4.min.css')}}">
   <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('../select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('../select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('../icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset('../jqvmap/jqvmap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('../css/adminlte.css')}}">
    <link rel="stylesheet" href="{{asset('../css/custom.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('../overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('../daterangepicker/daterangepicker.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('../summernote/summernote-bs4.min.css')}}">
     <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{asset('../sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
    <style type="text/css">/* Chart.js */
      @keyframes chartjs-render-animation{from{opacity:.99}to{opacity:1}}.chartjs-render-monitor{animation:chartjs-render-animation 1ms}.chartjs-size-monitor,.chartjs-size-monitor-expand,.chartjs-size-monitor-shrink{position:absolute;direction:ltr;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1}.chartjs-size-monitor-expand>div{position:absolute;width:1000000px;height:1000000px;left:0;top:0}.chartjs-size-monitor-shrink>div{position:absolute;width:200%;height:200%;left:0;top:0}
    </style>
</head>

     <!-- jQuery -->
    <script src="{{asset('../jquery/jquery.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{asset('../jquery-ui/jquery-ui.min.js')}}"></script>
    <!-- SweetAlert2 -->
    <script src="{{asset('../sweetalert2/sweetalert2.min.js')}}"></script>
    <!-- Toastr -->
    <script src="{{asset('../toastr/toastr.min.js')}}"></script>
    <script>
        var _base_url_ = 'http://bomwasa.test/Admin/';
    </script>
    <script src="../js/script.js"></script>
    <?xml version="1.0" encoding="utf-8"?>

  </head>  <body class="sidebar-mini layout-fixed control-sidebar-slide-open layout-navbar-fixed sidebar-mini-md sidebar-mini-xs text-sm" data-new-gr-c-s-check-loaded="14.991.0" data-gr-ext-installed="" style="height: auto;">
    <div class="wrapper">
     <style>
  .user-img{
        position: absolute;
        height: 27px;
        width: 27px;
        object-fit: cover;
        left: -7%;
        top: -12%;
  }
  .btn-rounded{
        border-radius: 50px;
  }
</style>
<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-light shadow text-sm">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route
            ('admindashboard')}}" class="nav-link">BOMWASA Water Billing System - Customer</a>
          </li>
        </ul>
       
      </nav>
      <!-- /.navbar -->    
<!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4 sidebar-no-expand">
        <!-- Brand Logo -->
        <a href="
        {{route('admindashboard')}}" class="brand-link bg-gradient-primary text-sm">
        <img src="{{asset('../images/logo.jpg')}}" alt="Store Logo" class="brand-image img-circle elevation-3 bg-gradient-light" style="opacity: .8;width: 1.5rem;height: 1.5rem;max-height: unset">
        <span class="brand-text font-weight-light">BOMWASA - WBS</span>
        </a>
        <!-- Sidebar -->
        <div class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-transition os-host-scrollbar-horizontal-hidden">
          <div class="os-resize-observer-host observed">
            <div class="os-resize-observer" style="left: 0px; right: auto;"></div>
          </div>
          <div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;">
            <div class="os-resize-observer"></div>
          </div>
          <div class="os-content-glue" style="margin: 0px -8px; width: 249px; height: 646px;"></div>
          <div class="os-padding">
            <div class="os-viewport os-viewport-native-scrollbars-invisible" style="overflow-y: scroll;">
              <div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;">
                <!-- Sidebar user panel (optional) -->
                <div class="clearfix"></div>
              </div>
            </div>
          </div>
          <div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden">
            <div class="os-scrollbar-track">
              <div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);"></div>
            </div>
          </div>
          <div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden">
            <div class="os-scrollbar-track">
              <div class="os-scrollbar-handle" style="height: 55.017%; transform: translate(0px, 0px);"></div>
            </div>
          </div>
          <div class="os-scrollbar-corner"></div>
        </div>
        <!-- /.sidebar -->
      </aside>
      <script>
   
  </script>           
           <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper  pt-3" style="min-height: 567.854px;">
     
        <!-- Main content -->
        <section class="content  text-dark">
          <div class="container-fluid">
            @yield('content')
          </div>
        </section>
        <!-- /.content -->
        
  <div class="modal fade" id="uni_modal_right" role='dialog'>
    <div class="modal-dialog modal-full-height  modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="fa fa-arrow-right"></span>
        </button>
      </div>
      <div class="modal-body">
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="viewer_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
              <button type="button" class="btn-close" data-dismiss="modal"><span class="fa fa-times"></span></button>
              <img src="" alt="">
      </div>
    </div>
  </div>
      </div>
      <!-- /.content-wrapper -->

    <footer class="main-footer text-sm">
        <strong>Copyright © 2023. 
        <!-- <a href=""></a> -->
        </strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
          <b>WBS (by: <a href="mailto:syntaxerrorslsubc@gmail.com" target="blank">syntaxError</a> )</b>
        </div>
      </footer>
    </div>
    <!-- ./wrapper -->
   
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button)
    </script>
   <!-- Bootstrap 4 -->
    <script src="{{asset('../bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- ChartJS -->
    <script src="{{asset('../chart.js/Chart.min.js')}}"></script>
    <!-- Sparkline -->
    <script src="{{asset('../sparklines/sparkline.js')}}"></script>
    <!-- Select2 -->
    <script src="{{asset('../select2/js/select2.full.min.js')}}"></script>
    <!-- JQVMap -->
    <script src="{{asset('../jqvmap/jquery.vmap.min.js')}}"></script>
    <script src="{{asset('../jqvmap/maps/jquery.vmap.usa.js')}}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{asset('../jquery-knob/jquery.knob.min.js')}}"></script>
    <!-- daterangepicker -->
    <script src="{{asset('../moment/moment.min.js')}}"></script>
    <script src="{{asset('../daterangepicker/daterangepicker.js')}}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{asset('../tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <!-- Summernote -->
    <script src="{{asset('../summernote/summernote-bs4.min.js')}}"></script>
    <script src="{{asset('../datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('../datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('../datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('../datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <!-- overlayScrollbars -->
    <!-- <script src="http://localhost/wbms/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script> -->
    <!-- AdminLTE App -->
    <script src="{{asset('../js/adminlte.js')}}"></script>
    <div class="daterangepicker ltr show-ranges opensright">
      <div class="ranges">
        <ul>
          <li data-range-key="Today">Today</li>
          <li data-range-key="Yesterday">Yesterday</li>
          <li data-range-key="Last 7 Days">Last 7 Days</li>
          <li data-range-key="Last 30 Days">Last 30 Days</li>
          <li data-range-key="This Month">This Month</li>
          <li data-range-key="Last Month">Last Month</li>
          <li data-range-key="Custom Range">Custom Range</li>
        </ul>
      </div>
      <div class="drp-calendar left">
        <div class="calendar-table"></div>
        <div class="calendar-time" style="display: none;"></div>
      </div>
      <div class="drp-calendar right">
        <div class="calendar-table"></div>
        <div class="calendar-time" style="display: none;"></div>
      </div>
      <div class="drp-buttons"><span class="drp-selected"></span><button class="cancelBtn btn btn-sm btn-default" type="button">Cancel</button><button class="applyBtn btn btn-sm btn-primary" disabled="disabled" type="button">Apply</button> </div>
    </div>
    <div class="jqvmap-label" style="display: none; left: 1093.83px; top: 394.361px;">Idaho</div>  </body>
</html>
