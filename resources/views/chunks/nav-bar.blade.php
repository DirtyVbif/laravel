<nav class="menu-wrapper">
  <ul class="menu">
    @if (\Request::route()->getName() !== 'home')
      <li class="menu__item"><a class="menu__link" href="{{ route('home') }}">Home</a></li>
    @endif
    <li class="menu__item"><a class="menu__link" href="{{ route('news') }}">News</a></li>
    <li class="menu__item"><a class="menu__link" href="{{ route('about') }}">About</a></li>
  </ul>
</nav>