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
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
        <a class="navbar-brand" href="#">{{ config('app.name') }}</a>

            {!! Form::open(['action' => 'PagesController@index', 'method' => 'GET', 'class' => 'form-inline my-2 my-lg-0']) !!}
                {!! Form::text('search', null, ['class' => 'form-control mr-sm-2', 'placeholder' => 'Search', 'aria-label' => 'Search']) !!}
                {!! Form::button('Search', ['type' => 'submit', 'class' => 'btn btn-outline-success my-2 my-sm-0']) !!}
            {!! Form::close() !!}
        </div>
    </nav>
    <!-- End: Navbar -->

    <!-- Begin: Content -->
    <div class="page-wrapper">
        <div class="container">
            @yield('content')
        </div>
    </div>
    <!-- End: Content -->


    <script src="https://embed.twitch.tv/embed/v1.js"></script>
    <script src="{{ mix('js/app.js') }}"></script>
    @stack('js')
</body>
</html>
