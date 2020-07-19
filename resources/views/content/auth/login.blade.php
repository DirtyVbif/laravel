@extends('page')

@section('content')
  <form action="{{ route('login') }}" method="POST" class="form" id="form-login">
    @csrf

    <div class="form__row">
      @include('chunks/form-field-error', ['field_name' => 'email'])
      <input type="email" name="email" class="form__input" placeholder="example@mail.ru" required autocomplete="email" autofocus>
    </div>

    <div class="form__row">
      @include('chunks/form-field-error', ['field_name' => 'password'])
      <input type="password" name="password" class="form__input" placeholder="password" required autocomplete="current-password">
    </div>

    <div class="form__row form__row_remember">
      <input class="form__checkbox" type="checkbox" name="remember" id="form-login-remember" {{ old('remember') ? 'checked' : '' }}>
      <label class="form__label" for="form-login-remember">
          {{ t('Remember me') }}
      </label>
    </div>

    <div class="form__row form__row_footer">
      <input type="submit" class="form__submit button button_solid" value="{{ t('Authorization') }}">
    </div>
  </form>
@endsection