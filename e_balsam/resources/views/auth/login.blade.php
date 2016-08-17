<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>E-Balsam</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="{{ asset( 'adminlte/bootstrap/css/bootstrap.min.css' ) }}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{ asset( 'adminlte/dist/css/adminlte.min.css' ) }}" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="{{ asset( 'adminlte/plugins/iCheck/square/blue.css' ) }}" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="{{ route( 'public.index' ) }}">Halaman Login E-Balsam</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Masukan Username dan Password</p>
        @if (count($errors) > 0)
          <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems !<br><br>
          </div>
        @endif
        <form action="{{ url('/auth/login') }}" method="post">
          <div class="form-group has-feedback">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input name="name" type="name" class="form-control" placeholder="Name" required/>
            @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input name="password" type="password" class="form-control" placeholder="Password" required/>
            @if ($errors->has('password')) <p class="help-block">{{ $errors->first('password') }}</p> @endif
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </form>
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="{{ asset( 'adminlte/plugins/jQuery/jQuery-2.1.4.min.js' ) }}"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{ asset( 'adminlte/bootstrap/js/bootstrap.min.js' ) }}" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="{{ asset( 'adminlte/plugins/iCheck/icheck.min.js' ) }}" type="text/javascript"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>