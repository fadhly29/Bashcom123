<?php 
  $role = json_decode(\Auth::user()->usergroup->access_right);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title> {{ $title }} </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="{{ asset( 'adminlte/bootstrap/css/bootstrap.css' ) }}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="{{ asset( 'adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.css' ) }}" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{ asset( 'adminlte/dist/css/adminlte.min.css' ) }}" rel="stylesheet" type="text/css" />
    <!-- adminlte Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="{{ asset( 'adminlte/dist/css/skins/_all-skins.min.css' ) }}" rel="stylesheet" type="text/css" />
    <!-- daterange picker -->
    <link href="{{asset('adminlte/plugins/daterangepicker/daterangepicker-bs3.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('adminlte/plugins/select2/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables/dataTables.bootstrap.css') }}">
    
    <!-- INCLUDE FOR PROGRESS BAR UPLOAD IMAGE -->
    <link rel="stylesheet" type="text/css" href="{{ asset('adminlte/css/multiple.css') }}">
    <!-- SAMPE SINI -->

    @yield('link')
    <style>
      .dropbtn {
          background-color: #3C8DBC;
          color: white;
          padding: 16px;
          font-size: 14px;
          border: none;
          cursor: pointer;
      }

      .dropdown {
          position: relative;
          display: inline-block;
      }

      .dropdown-content {
          display: none;
          position: absolute;
          background-color: #f9f9f9;
          width: 200px;
          box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      }

      .dropdown-content a {
          color: black;
          padding: 12px 16px;
          text-decoration: none;
          display: block;
      }

      .dropdown-content a:hover {background-color: #f1f1f1}

      .dropdown:hover .dropdown-content {
          display: block;
      }

      .dropdown:hover .dropbtn {
          background-color: #3C8DBC;
      }
      </style>

    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="skin-blue sidebar-mini sidebar-collapse">
    <div class="wrapper">

      <header class="main-header">
        @include('admin/layout/header')
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        @include('admin/layout/sidebar')
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        @yield('content')   
      </div><!-- /.content-wrapper -->

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.0
        </div>
        <strong>Copyright &copy; 2015 <a href="http://toruz-corp.com">Toruz Corporation</a>.</strong> All rights reserved.
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        @include('admin/layout/control')
      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class='control-sidebar-bg'></div>

    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="{{ asset( 'adminlte/plugins/jQuery/jQuery-2.1.4.min.js' ) }}"></script>
    <script type="text/javascript" src="{{ asset('adminlte/js/multiple_upload/swfupload/swfupload.js') }}"></script>
    <script type="text/javascript" src="{{ asset('adminlte/js/multiple_upload/jquery.swfupload.js') }}"></script>
    
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{ asset( 'adminlte/bootstrap/js/bootstrap.min.js' ) }}" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="{{ asset( 'adminlte/plugins/fastclick/fastclick.min.js' ) }}"></script>
    <!-- adminlte App -->
    <script src="{{ asset( 'adminlte/dist/js/app.min.js' ) }}" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="{{ asset( 'adminlte/plugins/sparkline/jquery.sparkline.min.js' ) }}" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="{{ asset( 'adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js' ) }}" type="text/javascript"></script>
    <script src="{{ asset( 'adminlte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js' ) }}" type="text/javascript"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="{{ asset( 'adminlte/plugins/slimScroll/jquery.slimscroll.min.js' ) }}" type="text/javascript"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="{{ asset( 'adminlte/plugins/chartjs/Chart.min.js' ) }}" type="text/javascript"></script>

    <!-- adminlte for demo purposes -->
    <script src="{{ asset( 'adminlte/dist/js/demo.js' ) }}" type="text/javascript"></script>

    <!-- InputMask -->
    <script src="{{asset('adminlte/plugins/input-mask/jquery.inputmask.js')}}" type="text/javascript"></script>
    <script src="{{asset('adminlte/plugins/input-mask/jquery.inputmask.date.extensions.js')}}" type="text/javascript"></script>
    <script src="{{asset('adminlte/plugins/input-mask/jquery.inputmask.extensions.js')}}" type="text/javascript"></script>
    
    <!-- Bootstrap time Picker -->
    <link href="{{asset('adminlte/plugins/timepicker/bootstrap-timepicker.min.css')}}" rel="stylesheet"/>
    <!-- date-range-picker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js" type="text/javascript"></script>
    <script src="{{asset('adminlte/plugins/daterangepicker/daterangepicker.js')}}" type="text/javascript"></script>

    <!-- DataTables -->
    <script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
    
    <!-- number_format js -->
    @yield('script')

    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable();
        $('#example3').DataTable();
        $('#example4').DataTable();
        $("#example5").DataTable();
        $('#example6').DataTable();
        $('#example7').DataTable();
        $('#example8').DataTable();
      });
    </script>

      <div class="modal fade" id="profile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
          <?php $user = \Auth::user(); ?>
            <form role="form" action="{{route('uacl.user.update', \Crypt::encrypt($user->id))}}" method="POST" novalidate enctype="multipart/form-data">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Update {{ $user->name }}</h4>
              </div>
              <div class="modal-body">
                <div class="nav-tabs-custom">
                  <ul class="nav nav-tabs">
                    <li class="active"><a href="#profile_1" data-toggle="tab" aria-expanded="true">Personal Info</a></li>
                    <li class=""><a href="#profile_2" data-toggle="tab" aria-expanded="false">Change Password</a></li>
                  </ul>
                  <div class="tab-content">
                    <div class="tab-pane active" id="profile_1">
                      <div class="box-body">
                        <div class="form-group">
                          <label>Name</label>
                          <input name="name" class="form-control" placeholder="Enter User Name" value="{{$user->name}}" required>
                        </div>
                        <div class="form-group">
                          <label>Email</label>
                          <input type="email" name="email" class="form-control" placeholder="Enter User Email" value="{{$user->email}}" required>
                        </div>
                        <hr>
                        <div class="form-group">
                          <span class="btn btn-success btn-file">
                              Upload Avatar Image <input type="file" name="avatar">
                          </span>
                          @if( $user->avatar != null )
                            <img src="{{ asset($user->avatar) }}" border="0" width="50" class="img-circle">
                          @endif
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane" id="profile_2">
                      <div class="form-group">
                        <label>Password</label>
                        <input name="password" type="password" class="form-control" placeholder="Enter password" required>
                      </div>
                      <div class="form-group">
                        <label>Confirm Password</label>
                        <input name="password_confirmation" type="password" class="form-control" placeholder="Confirm password" required>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </form>
          </div>
        </div>
      </div>
  </body>
</html>