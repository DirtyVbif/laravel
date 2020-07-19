<nav class="menu-wrapper">
  <ul class="menu">
    @if (!isFrontPage())
      <li class="menu__item"><a class="menu__link" href="{{ route('home') }}">Home</a></li>
    @endif
    <li class="menu__item"><a class="menu__link" href="{{ route('news') }}">News</a></li>
    <li class="menu__item"><a class="menu__link" href="{{ route('about') }}">About</a></li>
    @if (isModerator())
      <li class="menu__item"><a class="menu__link" href="{{ route('structure') }}">Structure</a></li>
    @endif
  </ul>
</nav>