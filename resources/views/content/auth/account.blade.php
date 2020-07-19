@extends('page')

@section('content')
  <article>
    <h3>{{ t('Profile summary') }}</h3>
    <ul>
      <li>
        <span>{{ t('User name') }}:</span>
        <span>{{ $user->name }}</span>
      </li>

      <li>
        <span>E-mail:</span>
        <span>{{ $user->email }}</span>
      </li>

      <li>
        <span>{{ t('Registered for') }}:</span>
        <span>{{ $user->lifetime }}</span>
      </li>
    </ul>
  </article>
@endsection