<!DOCTYPE html>
<html>
    <head>
        <title>404 Halaman Tidak Ditemukan</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #B0BEC5;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            img{
                width: 800px;
                height: 500px;
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 72px;
                margin-bottom: 40px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <!-- <div class="title">404 Not Found</div> -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="title">
                            <center>
                                Oops!! Halaman Tidak di temukan!!
                            </center>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <center>
                            <img src="{{ asset('images/404-Error.jpg') }}" class="img-responsive">
                        </center>
                    </div>
                    <div class="col-md-12">
                        <center>
                            <a href="{{ route('public.index') }}" class="btn btn-danger">Back</a>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</html>
