<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{asset('limitless/assets/css/icons/icomoon/styles.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('limitless/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('limitless/assets/css/bootstrap_limitless.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('limitless/assets/css/layout.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('limitless/assets/css/components.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('limitless/assets/css/colors.min.css')}}" rel="stylesheet" type="text/css">
    {{--<link href="{{asset('css/custom.css')}}" rel="stylesheet" type="text/css">--}}
    {{--@stack('style')--}}
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script src="{{asset('limitless/assets/js/global_assets/js/main/jquery.min.js')}}"></script>
    <script src="{{asset('limitless/assets/js/global_assets/js/main/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('limitless/assets/js/global_assets/js/plugins/loaders/blockui.min.js')}}"></script>
    @stack('scripts')
    <!-- /core JS files -->
</head>
<body class="bg-slate-800">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">
            @yield('content')
        </div>
    </div>

</body>
</html>