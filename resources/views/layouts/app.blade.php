<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'AIC NANDI AREA') }}</title>

    <!-- Scripts -->

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
		
		<!-- Bootstrap CSS -->
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
		
		<!-- Lineawesome CSS -->
        <link rel="stylesheet" href="{{ asset('css/line-awesome.min.css') }}">
		
		<!-- Datatable CSS -->
		<link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
		
		<!-- Select2 CSS -->
		<link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
		
		<!-- Datetimepicker CSS -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap-datetimepicker.min.css') }}">
        
		@livewireStyles
		<!-- Main CSS -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="main-wrapper">
         @include('layouts.header')
         @include('layouts.sidemenu')
        <div>
            @yield('content')
        </div>
    </div>
    @include('layouts.footer')

