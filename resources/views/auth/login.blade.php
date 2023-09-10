<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <!-- App Favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App title -->
    <title>Login</title>

    <!-- Bootstrap CSS -->
    <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- App CSS -->
    <link href="{{ url('assets/css/style.css') }}" rel="stylesheet" type="text/css" />

    <!-- Modernizr js -->
    <script src="{{ url('assets/js/modernizr.min.js') }}"></script>

</head>


<body>

    <div class="account-pages"></div>
    <div class="clearfix"></div>
    <div class="wrapper-page">

        <div class="account-bg">
            <div class="card-box mb-0">
                <div class="m-t-10 p-20">
                    <div class="row">
                        <div class="col-12 text-center">
                            <h4 class="text-muted text-uppercase m-b-0 m-t-0">Sign In</h4>
                        </div>
                    </div>
                    <form class="m-t-20" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-12">
                                <input id="username" type="username"
                                    class="form-control @error('username') is-invalid @enderror" name="username"
                                    value="{{ old('username') }}" required autocomplete="username" autofocus>
                            </div>
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password">
                            </div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <div class="checkbox checkbox-custom">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember" style="padding-left: 20px">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-center row m-t-10">
                            <div class="col-12">
                                <button class="btn btn-success btn-block waves-effect waves-light" type="submit">LogIn</button>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>

                </div>

                <div class="clearfix"></div>
            </div>
        </div>

    </div>

    <script>
        var resizefunc = [];
    </script>

    <!-- jQuery  -->
    <script src="{{ url('assets/js/jquery.min.js') }}"></script>
    <script src="{{ url('assets/js/popper.min.js') }}"></script><!-- Tether for Bootstrap -->
    <script src="{{ url('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('assets/js/detect.js') }}"></script>
    <script src="{{ url('assets/js/waves.js') }}"></script>
    <script src="{{ url('assets/js/jquery.nicescroll.js') }}"></script>
    <script src="{{ url('assets/plugins/switchery/switchery.min.js') }}"></script>

    <!-- App js -->
    <script src="{{ url('assets/js/jquery.core.js') }}"></script>
    <script src="{{ url('assets/js/jquery.app.js') }}"></script>

</body>

</html>
