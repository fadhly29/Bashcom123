<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>E-Balsam - Balikpapan Samarinda</title>
	<!-- core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.transitions.css') }}" rel="stylesheet">
    <link href="{{ asset('css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{ asset( 'adminlte/dist/css/AdminLTE.min.css' ) }}" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="{{ asset( 'adminlte/plugins/iCheck/square/blue.css' ) }}" rel="stylesheet" type="text/css" />
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/kaltim.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <script src="{{ asset('js/classie.js') }}"></script>
     <script type="text/javascript">
        $('#myModal').on('shown.bs.modal', function () {
          $('#myInput').focus()
        })
     </script>

</head><!--/head-->

<body id="home" class="homepage">

    <header id="header">
        <nav id="main-menu" class="navbar navbar-default navbar-fixed-top" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href=""><img src="images/logo3.png" alt="logo"></a>
                </div>
				
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="scroll active"><a href="#home">Home</a></li>
                        <li class="scroll"><a href="#portfolio">Agenda</a></li>
                        <li class="scroll"><a href="#about">Tentang Kami</a></li>
                        <li class="scroll"><a href="#get-in-touch">Kontak</a></li> 
                        @if ( \Auth::user() )
                        <li><a href="{{ route( 'system.index' ) }}" >Dashboard</a></li> 
                        @else
                        <li><a href="#" data-toggle="modal" data-target="#myModal" class="spawnModal">Login</a></li> 

                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-body">
                                <div class="login-box">
                                  <div class="login-logo">
                                    <a href="{{ route( 'public.index' ) }}" style="font-family: 'Palatino Linotype', 'Book Antiqua', Palatino, serif;"><i>Silahkan Masuk</i></a>
                                  <
                                  <div class="login-box-body">
                                    @if (count($errors) > 0)
                                      <div class="alert alert-danger">
                                        <strong>Whoops!</strong> There were some problems !<br><br>
                                      </div>
                                    @endif
                                    <form action="{{ url('/auth/login') }}" method="post">
                                      <div class="form-group has-feedback">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input name="name" type="text" class="form-control" placeholder="Name" required/>
                                        @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
                                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                      </div>
                                      <div class="form-group has-feedback">
                                        <input name="password" type="password" class="form-control" placeholder="Password" required/>
                                        @if ($errors->has('password')) <p class="help-block">{{ $errors->first('password') }}</p> @endif
                                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                      </div>
                                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                                    </form>
                                  </div>
                                </div> <!-- /.login-box -->
                              </div>
                              
                            </div>
                          </div>
                        </div>
                        @endif                   
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
    </header><!--/header-->

    @yield('content')

    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <center>
                        &copy; 2016 - 2017 E-Balsam (Balikpapan - Samarinda) Web Portal Pengadaan Tanah.
                    </center>
                </div>
            </div>
        </div>
    </footer><!--/#footer-->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/mousescroll.js') }}"></script>
    <script src="{{ asset('js/smoothscroll.js') }}"></script>
    <script src="{{ asset('js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('js/jquery.isotope.min.js') }}"></script>
    <script src="{{ asset('js/jquery.inview.min.js') }}"></script>
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

</body>
</html>