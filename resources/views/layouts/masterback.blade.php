<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title', 'Blog PHP')</title>

        <link rel="stylesheet" href="{{ url('assets/css/app.min.css') }}">
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:400,300,700,400italic">
        
    </head>
    <body class="masterback">
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
        <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script src="{{ url('assets/js/app.min.js') }}"></script>
    </body>
</html>
