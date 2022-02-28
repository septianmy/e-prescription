<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Prescription</title>

    <link rel="icon" href="{{ asset('dist/favicon.ico') }}" type="image/gif" sizes="16x16">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- Select 2-->
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('css/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('css/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('css/daterangepicker.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/buttons.bootstrap4.min.css') }}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap-4.min.css') }}">
    <!-- Custom -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

@php
    $date = Carbon\Carbon::now()->locale('id_ID')->isoFormat('dddd, D MMMM Y');;
    
@endphp

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            
            <div class="ml-auto"><b>{{$date}}</b></div>
            <!-- Right navbar links -->
            
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        {{-- <img src="{{ asset('dist/cuteeth_logo.png') }}" alt="User Image"> --}}
                    </div>
                    {{-- <div class="info">
                        <a href="#" class="d-block"><b>Dental Clinic</b></a>
                    </div> --}}
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="/" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="far fa-clipboard nav-icon"></i>
                                <p>
                                    Master Data
                                </p>
                                <i class="fas fa-angle-left right"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/data-obat" class="nav-link">
                                        <i class="fas fa-capsules nav-icon"></i>
                                      <p>Data Obat</p>
                                    </a>
                                </li>
                                  <li class="nav-item">
                                    <a href="/data-signa" class="nav-link">
                                        <i class="fas fa-stethoscope nav-icon"></i>
                                      <p>Data Signa</p>
                                    </a>
                                  </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-clipboard nav-icon"></i>
                                <p>Resep</p>
                                <i class="fas fa-angle-left right"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/new-receipt" class="nav-link">
                                        <i class="fas fa-stethoscope nav-icon"></i>
                                      <p>Buat Resep Baru</p>
                                    </a>
                                </li>
                                  <li class="nav-item">
                                    <a href="/receipt-history" class="nav-link">
                                        <i class="fas fa-capsules nav-icon"></i>
                                      <p>History Resep</p>
                                    </a>
                                  </li>
                            </ul>
                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        @yield('content')
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2022 Septian Maulana Yusuf.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">

            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)

    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <!-- Auto Numeric-->
    <script src="{{ asset('js/autonumeric.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Select 2 -->
    <script src="{{ asset('js/select2.full.min.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('js/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.vmap.usa.js') }}"></script>
    <script src="{{ asset('js/jquery.vmap.indonesia.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('js/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('js/moment.min.js') }}"></script>
    <script src="{{ asset('js/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('js/adminlte.js') }}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/jszip.min.js') }}"></script>
    <script src="{{ asset('js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('js/vfs_fonts.js') }}"></script>
    <script src="{{ asset('js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('js/buttons.colVis.min.js') }}"></script>
    <!-- SweetAlert2 -->
    <script src="{{ asset('js/sweetalert2.min.js') }}"></script>
    <!-- Custom -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Page specific script -->
    <script>
        
        //Date and time picker
        $('#end_date_ssl, #end_date_promo, #start_date_promo').datetimepicker({ 
            icons: { time: 'far fa-clock' },
            format: 'YYYY/MM/DD hh:mm:ss',
        });
        @if (Session::has('notification'))
            const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
            });
            var typeNotification = "{{ Session::get('notification')['alert_type'] }}";
            switch(typeNotification){
            case 'info':
            Swal.fire({
            type: 'info',
            icon: 'info',
            title: "{{ Session::get('notification')['message'] }}"
            });
            break;
        
            case 'warning':
            Swal.fire({
            type: 'warning',
            icon: 'warning',
            title: "{{ Session::get('notification')['message'] }}"
            });
            break;
        
            case 'success':
            Swal.fire({
            type: 'success',
            icon: 'success',
            title: "{{ Session::get('notification')['message'] }}"
            });
            break;
        
            case 'error':
            Swal.fire({
            type: 'error',
            icon: 'error',
            title: "{{ Session::get('notification')['message'] }}"
            });
            }
        @endif

    </script>
    @yield('js')
</body>

</html>
