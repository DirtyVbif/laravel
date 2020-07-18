@extends('page')

@section('content')
  <form action="{{ route('login') }}" method="POST" class="form">
    @csrf
    <input type="hidden" name="action" value="login">

    <div class="form__row">
      @error('email')
        {{ $message }}
      @enderror
      <input type="email" name="email" class="form__input" placeholder="example@mail.ru" required value="{{ old('email') }}">
    </div>

    <div class="form__row">
      @error('password')
        {{ $message }}
      @enderror
      <input type="password" name="password" class="form__input" placeholder="password" required>
    </div>

    <div class="form__row form__row_footer">
      <input type="submit" class="form__submit button button_solid" value="Sign in">
    </div>
  </form>
@endsection