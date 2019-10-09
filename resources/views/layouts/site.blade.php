<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    <link rel="stylesheet" href="{{ asset('css/style.default.css') }}">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
      <header class="header">
        @include('layouts.nav')
      </header>
      <div class="container">
        <div class="row">
            @yield('content')
            <aside class="col-lg-4">
              {{-- @include('layouts.latest_posts_widget') --}}
              @include('layouts.category_widget')
              @include('layouts.tag_widget')
            </aside>
        </div>  
      </div>
      </div>
</body>
</html>
