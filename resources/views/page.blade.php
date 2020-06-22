<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>{{ $title }}</title>

  <meta name="robots" content="noindex, nofollow">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

  <!-- Styles -->
  <link rel="stylesheet" href="/css/main.min.css">

  <!-- scripts -->
  {{-- <script src="/js/jquery.min-3.5.1.js"></script> --}}
  <script src="/js/main.min.js?v=<?=time()?>"></script>

  <!-- livereload -->
  <script>
    document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] +
    ':35729/livereload.js?snipver=1"></' + 'script>')
  </script> 
</head>

<body>
  <header>
    @section('header-menu')
    <nav class="menu-wrapper">
      <ul class="menu">
        @if (\Request::route()->getName() !== 'home')
          <li class="menu__item"><a class="menu__link" href="{{ route('home') }}">Home</a></li>
        @endif
        <li class="menu__item"><a class="menu__link" href="{{ route('news') }}">News</a></li>
        <li class="menu__item"><a class="menu__link" href="{{ route('about') }}">About</a></li>
      </ul>
    </nav>
    @show
  </header>

  <main>
    @yield('content')
  </main>

  <footer class="page-footer">
    @section('footer')
      <div class="container container_footer">All rights reserved &copy; 2020 by Michael Uspensky</div>
    @show
  </footer>

</body>
</html>