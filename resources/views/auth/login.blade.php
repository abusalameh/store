<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Meethaq - User Login | ميثاق - صفحة تسجيل الدخول</title>
    
    <meta name="description" content="">
    <meta name="author" content="">
      
     <meta name="token" id="token" value="{{csrf_token()}}">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

    <!-- BEGIN CORE CSS -->
    <link rel="stylesheet" href="{{ asset('admin1/css/admin1.css') }}">
    <link rel="stylesheet" href="{{ asset('globals/css/elements.css') }}">
    <!-- END CORE CSS -->

    <!-- BEGIN PLUGINS CSS -->
    <link rel="stylesheet" href="{{ asset('globals/plugins/bootstrap-social/bootstrap-social.css') }}">
    <!-- END PLUGINS CSS -->

    <!-- FIX PLUGINS -->
    <link rel="stylesheet" href="{{ asset('globals/css/plugins.css') }}">
    <!-- END FIX PLUGINS -->

    <!-- BEGIN SHORTCUT AND TOUCH ICONS -->
    <link rel="shortcut icon" href="{{ asset('globals/img/icons/favicon.ico') }} ">
    <link rel="apple-touch-icon" href="{{ asset('globals/img/icons/apple-touch-icon.png') }} ">
    <!-- END SHORTCUT AND TOUCH ICONS -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}" media="screen" title="no title" charset="utf-8">
    <script src="{{ asset('globals/plugins/modernizr/modernizr.min.js') }}"></script>
</head>
<body class="bg-login printable" id="v-app">
    <form name="login" action="{{ URL('login')}}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="login-screen">
            <div class="panel-login blur-content">
                 <div class="panel-heading">
                     <img src="{{ asset('globals/img/meethaq-logo.png') }}" height="70" alt="">
                 </div><!--.panel-heading -->
                <div id="pane-login" class="panel-body active">
                    <h2>{{ trans('lang.Login to Dashboard') }}</h2>
                    <div class="form-group">
                        <div class="inputer">
                            <div class="input-wrapper">
                                <input type="text" name="username" class="form-control {{trans('lang.direction')}}-font" placeholder="{{ trans('lang.username') }}" dir="{{ trans('lang.direction')}}" style="color:white" required>
                            </div>
                        </div>
                    </div><!--.form-group-->
                    <div class="form-group">
                        <div class="inputer">
                            <div class="input-wrapper">
                                <input type="password" name="password" class="form-control {{trans('lang.direction')}}-font" placeholder="{{ trans('lang.password') }}" dir="{{ trans('lang.direction')}}" style="color:white" required>
                            </div>
                        </div>
                    </div><!--.form-group-->
                    <div class="form-buttons clearfix">
                        <button type="submit" class="btn btn-primary btn-block btn-lg btn-ripple">{{ trans('lang.login') }}</button>
                    </div><!--.form-buttons-->
                </div><!--#login.panel-body-->
            </div><!--.blur-content-->
            @if ($errors->has('username'))
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>{{ $errors->first('username') }}</strong>
                </div>
            @endif

            <div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>{{trans('lang.username')}}: admin | {{ trans('lang.password') }}: password</strong>
            </div>
        </div><!--.login-screen-->
    </form>
    <div class="bg-blur dark">
        <div class="overlay"></div><!--.overlay-->
    </div><!--.bg-blur-->

    <svg version="1.1" xmlns='http://www.w3.org/2000/svg'>
        <filter id='blur'>
            <feGaussianBlur stdDeviation='7' />
        </filter>
    </svg>

    <!-- BEGIN GLOBAL AND THEME VENDORS -->
    <script src="{{ asset('globals/js/global-vendors.js') }}"></script>
    <!-- END GLOBAL AND THEME VENDORS -->

    <!-- BEGIN PLUGINS AREA -->
    <!-- END PLUGINS AREA -->

    <!-- PLUGINS INITIALIZATION AND SETTINGS -->
    <script src="{{ asset('globals/scripts/user-pages.js') }}"></script>
    <!-- END PLUGINS INITIALIZATION AND SETTINGS -->

    <!-- PLEASURE Initializer -->
    <script src="{{ asset('globals/js/pleasure.js') }}"></script>
    <!-- ADMIN 1 Layout Functions -->
    <script src="{{ asset('admin1/js/layout.js') }}"></script>
    
    <!-- BEGIN INITIALIZATION-->
    <script>
    $(document).ready(function () {
        Pleasure.init();
        Layout.init();
        UserPages.login();
    });
    </script>

    <script src="{{ asset('js/vendor.js') }}"></script>
    {{-- <script src="{{ asset('js/auth.js') }}"></script> --}}
    {{-- <script src="{{ asset('js/vue-spinner.js') }}"></script> --}}
    {{-- <script>
        var ClipLoader = Vue.ClipLoader;
    </script> --}}
    <!-- <script>
        Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');
    </script> -->
    
</body>
</html>