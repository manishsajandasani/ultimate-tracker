<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ Config::get('global.admin_panel_name') }}</title>
    <link rel="shortcut icon" href="{{ asset(Config::get('global.favicon')) }}" type="image/png" />

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">

    @yield('admin-styles')

    <!-- New Admin Theme style -->
    <link rel="stylesheet" href="{{ asset('admin/dist/css/new-admin-style.css') }}">
</head>

<body class="hold-transition dark-mode sidebar-mini">
    <div class="wrapper">