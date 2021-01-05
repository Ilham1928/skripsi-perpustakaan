<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        @include('layout.admin.header')
        @stack('css')
    </head>
    <body class="theme-amber">
        @include('layout.admin.navbar')
        @include('layout.admin.menu')
        @yield('content')
    </body>
    <footer>
        @include('layout.admin.footer')
        @stack('js')
    </footer>
</html>
