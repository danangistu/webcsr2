<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>404 - Error Page not Found</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('contents/'.$setting->favicon) }}">

        <!-- App css -->
        <link href="{{ url('admin') }}/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('admin') }}/assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('admin') }}/assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('admin') }}/assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('admin') }}/assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('admin') }}/assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('admin') }}/assets/css/responsive.css" rel="stylesheet" type="text/css" />

        <script src="{{ url('admin') }}/assets/js/modernizr.min.js"></script>

    </head>


		<body style="background-size: 100% auto;background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), url({{ asset('contents/'.$setting->bg_login) }})center center/cover no-repeat !important">

        <!-- HOME -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">

                        <div class="wrapper-page">
                            <div class="account-pages">
                                <div class="account-box">

                                    <div class="account-logo-box">
                                        <h2 class="text-uppercase text-center">
																						<a href="{{ url('/') }}" class="text-success">
																								<span><img src="{{ asset('contents/'.$setting->logo) }}" alt="" height="100"></span>
																						</a>
                                        </h2>
                                    </div>

                                    <div class="account-content">
                                        <h1 class="text-error">404</h1>
                                        <h2 class="text-uppercase text-danger m-t-30">Halaman tidak ditemukan</h2>
                                        <p class="text-muted m-t-30">Kesalahan dalam penginputan alamat url. Silakan cek kembali alamat url yang anda inputkan atau koneksi internet anda!</p>

                                        <a class="btn btn-md btn-block btn-primary waves-effect waves-light m-t-20" href="{{ url('admin') }}/index.html"> Kembali ke Dashboard</a>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
          </section>
          <!-- END HOME -->


        <!-- jQuery  -->
        <script src="{{ url('admin') }}/assets/js/jquery.min.js"></script>
        <script src="{{ url('admin') }}/assets/js/bootstrap.min.js"></script>
        <script src="{{ url('admin') }}/assets/js/waves.js"></script>
        <script src="{{ url('admin') }}/assets/js/jquery.slimscroll.js"></script>
        <script src="{{ url('admin') }}/assets/js/jquery.scrollTo.min.js"></script>

        <!-- App js -->
        <script src="{{ url('admin') }}/assets/js/jquery.core.js"></script>
        <script src="{{ url('admin') }}/assets/js/jquery.app.js"></script>

    </body>
</html>
