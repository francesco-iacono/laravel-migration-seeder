<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Articles</title>

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    </head>
    <body>
      <div>
        <header>
          @yield('header')
        </header>
        <main>
          @yield('main')
        </main>
        <footer>
          @yield('footer')
        </footer>
      </div>
    </body>
</html>