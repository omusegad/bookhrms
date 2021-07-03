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
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">


		<!-- Bootstrap CSS -->

		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">


		<!-- Datatable CSS -->
		<link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">

		<!-- Datetimepicker CSS -->
		<link rel="stylesheet" href="{{ asset('css/bootstrap-datetimepicker.min.css') }}">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

        <link href="https://cdn.datatables.net/select/1.2.7/css/select.dataTables.min.css" rel="stylesheet">

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
    @stack('custom-scripts')

