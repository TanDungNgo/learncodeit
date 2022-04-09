<!DOCTYPE html>
<html lang="en">
    <head>
        @include('head')
    </head>

    <body >
        <!-- Header -->
        @include('header')

        @yield('content')

        @include('footer')
    </body>
</html>
