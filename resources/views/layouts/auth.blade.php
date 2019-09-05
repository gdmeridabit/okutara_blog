<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <!-- Styles -->
  <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
  <link rel="shortcut icon" href="{{ asset('img/logo1_black.png') }}">
</head>
<body style="background-color: #ebecf000 !important; background: url('{{ asset('img/okutama.jpg') }}') center center no-repeat fixed; background-size: cover;">
  <div id="app">
    <main>
      @yield('content')
    </main>
  </div>
</body>
</html>
