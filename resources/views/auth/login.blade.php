<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ Config::get('global.admin_panel_name') }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
    <!-- New Admin Theme style -->
    <link rel="stylesheet" href="{{ asset('admin/dist/css/new-admin-style.css') }}">
</head>

<body class="hold-transition dark-mode login-page">
    <div class="login-box">

        @if (Session::has('invalid-credentials'))
            <div class="alert alert-danger">
                {{ Session::get('invalid-credentials') }}
            </div>
        @endif

        @if (Session::has('unauthorized-user'))
            <div class="alert alert-danger">
                {{ Session::get('unauthorized-user') }}
            </div>
        @endif

        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <form action="{{ route('login.authorize') }}" method="post">
                    @csrf
                    <div class="input-group mb-1">
                        <input type="email" class="form-control" placeholder="Enter Email" name="email"
                            id="email" value="msajandasani@gmail.com">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <p class="text-danger">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </p>
                    <div class="input-group mb-1">
                        <input type="password" class="form-control" placeholder="Enter Password" name="password"
                            id="password" value="man!@#8426">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <p class="text-danger">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </p>
                    <div class="row justify-content-center">
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
