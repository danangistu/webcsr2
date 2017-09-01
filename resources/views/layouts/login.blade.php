<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
				<title>{{ $setting->meta_title }} | Login</title>
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
                    <div class="col-sm-12">

                        <div class="wrapper-page">

                            <div class="account-pages">
                                <div class="account-box">
                                    <div class="account-logo-box">
                                        <h2 class="text-uppercase text-center">
                                            <a href="{{ url('/') }}" class="text-success">
                                                <span><img src="{{ asset('contents/'.$setting->logo) }}" alt="" height="100"></span>
                                            </a>
                                        </h2>
                                        <!-- <h5 class="text-uppercase font-bold m-b-5 m-t-50">{{ $setting->system_name }}</h5> -->
                                        <!-- <p class="m-b-0">Login</p> -->
                                    </div>
                                    <div class="account-content">
																				@include('common.alert')
                                        <form class="form-horizontal" action="{{ url('login') }}" method="post">
																						{{ csrf_field() }}
                                            <div class="form-group m-b-20">
                                                <div class="col-xs-12">
                                                    <label for="emailaddress">Username atau Email</label>
                                                    <input class="form-control" name="email" type="text" required="" placeholder="Username atau Email">
                                                </div>
                                            </div>

                                            <div class="form-group m-b-20">
                                                <div class="col-xs-12">
                                                    <a class="text-muted pull-right"><small>Lupa Kata Sand?</small></a>
                                                    <label for="password">Kata Sandi</label>
                                                    <input class="form-control" name="password" type="password" required="" placeholder="Masukkan kata sandi">
                                                </div>
                                            </div>

                                            <div class="form-group m-b-20">
                                                <div class="col-xs-12">

                                                    <div class="checkbox checkbox-success">
                                                        <input id="remember" type="checkbox" checked="">
                                                        <label for="remember">
                                                            Remember me
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="form-group text-center m-t-10">
                                                <div class="col-xs-12">
                                                    <button class="btn btn-md btn-block btn-primary waves-effect waves-light" type="submit">Sign In</button>
                                                </div>
                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </div>
                            <!-- end card-box-->


                        </div>
                        <!-- end wrapper -->

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
