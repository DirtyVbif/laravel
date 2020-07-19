<ul class="user-bar">
  @if (isAnonym())
    <li class="user-bar__item"><a class="user-bar__link button button_solid" href="{{ route('login') }}">{{ t('Login') }}</a></li>
    <li class="user-bar__item"><a class="user-bar__link button button_ghost" href="{{ route('register') }}">{{ t('Register') }}</a></li>
  @else
    <li class="user-bar__item"><a class="user-bar__link button button_solid" href="{{ route('account') }}">{{ t('Profile') }}</a></li>
    <li class="user-bar__item"><a class="user-bar__link button button_ghost" href="{{ route('logout') }}">{{ t('Logout') }}</a></li>
  @endif
</ul>