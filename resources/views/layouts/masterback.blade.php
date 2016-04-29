<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title', 'Blog PHP')</title>

        <link rel="stylesheet" href="{{ asset('assets/css/knacss.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/mainback.css') }}">
        <link href='https://fonts.googleapis.com/css?family=Lato:400,300,700,400italic' rel='stylesheet' type='text/css'>
        
    </head>
    <body>
        <header>
            <h1>Conférences PHP</h1>
            <nav>@include('partials.navback')</nav>
        </header>

        <div class="main">
            <div class="sidebar">
                @yield('sidebar')
            </div>
            
            <div class="content">
                @yield('content')
            </div>
        </div>

        <footer></footer>

        <script src="http://code.jquery.com/jquery-2.2.2.min.js"></script>
        <script src="{{ asset('assets/js/app.min.js') }}"></script>
    </body>
</html>
