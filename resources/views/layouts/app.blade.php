<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <title>{{ config('app.name') }}</title>
    @stack('css')
</head>
<body>
    <!-- Begin: Navbar -->
    <nav class="navbar navbar-dark bg-secondary">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name') }}</a>

            <span class="navbar-text">
                Search for streams on Twitch!
            </span>
        </div>
    </nav>
    <!-- End: Navbar -->


    <!-- Begin: Page header -->

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            @yield('page-header')
        </div>
    </div>
    <!-- End: Page header -->


    <!-- Begin: Content -->
    <div class="page-wrapper">
        <div class="container">
            @yield('content')
        </div>
    </div>
    <!-- End: Content -->


    <script src="http://player.twitch.tv/js/embed/v1.js"></script>
    <script src="{{ mix('js/app.js') }}"></script>
    @stack('js')
</body>
</html>
