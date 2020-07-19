<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
  <title>{{ $title }}</title>

  <meta name="robots" content="noindex, nofollow">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

  <!-- Styles -->
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/admin.min.css') }}">
  @stack('css')

  <!-- livereload -->
  <script>
    document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] +
    ':35729/livereload.js?snipver=1"></' + 'script>')
  </script> 
</head>

<body>
  <header>
    @section('nav-bar')
      <x-nav-bar></x-nav-bar>
    @show
    
    @section('breadcrumbs')
      <div class="container container_header-line">
        <x-breadcrumbs></x-breadcrumbs>
      </div>
    @show
  </header>

  @section('status')    
    @if (session('status'))
      <div class="container container_status" role="alert">
        {{ session('status') }}
      </div>
    @endif
  @show

  <main class="container container_content">
    <section>
      @section('page-title')
        @isset ($page_title)
          <h1 class="page-header">{{ $page_title }}</h1>
        @endisset
      @show

      @yield('content')
    </section>
  </main>

  <footer class="page-footer">
    @section('footer')
      <x-footer-rights></x-footer-rights>
    @show
  </footer>

  <!-- scripts -->
  <script type="text/javascript" src="{{ asset('/js/jquery-3.5.1.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('/js/main.min.js?v='.time()) }}"></script>
  @stack('js')
</body>
</html>