<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>

        <link rel="stylesheet" href="{{ url('assets/css/app.min.css') }}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:400,300,700,400italic" >
        
    </head>
    <body class="masterfront">
        <header>
            <h1>Blog PHP</h1>
            <nav>@include('partials.nav')</nav>
        </header>

        <div class="main">
            <div class="content">
                @yield('content')
            </div>

            <aside class="sidebar">
                @yield('sidebar')
            </aside>
        </div>

        <footer>
            @yield('footer')
        </footer>
    </body>
</html>
