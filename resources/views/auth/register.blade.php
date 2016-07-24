<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
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
<body>
<div class="container">
    <h1>Register</h1>
    <hr>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Username</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="username" value="{{ old('username') }}">

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
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
</body>
</html>