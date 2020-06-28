<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
  @isset ($title)
  <title>{{ $title }}</title>
  @endisset

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
    @section('nav-bar')
      @include('chunks/nav-bar')
    @show
    
    @section('user-bar')
      <div class="container container_header-line">
        @include('chunks/breadcrumbs')
        @include('chunks/user-bar')
      </div>
    @show
  </header>

  <main class="container">
    <section>
      @isset ($page_title)
        @section('page-title')
          <h1 class="page-header">{{ $page_title }}</h1>
        @show
      @endisset

      @yield('content')
    </section>
  </main>

  <footer class="page-footer">
    @section('footer')
      <div class="container container_footer">
        <div class="container_footer__line">All rights reserved &copy; 2020 by <a href="https://vk.com/dirty.mike" target="_blank" class="footer-link">Michael Uspensky</a></div>
        <div class="container_footer__line"><a href="https://github.com/DirtyVbif/laravel" target="_blank" class="footer-link">This project on git</a></div>
      </div>
    @show
  </footer>

</body>
</html>