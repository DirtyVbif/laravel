@extends('page')

@section('content')
  <div class="content-block content-block_register">
    <form action="{{ route('register') }}" method="POST" class="form" id="form-user-register">
      @csrf
      <input type="hidden" name="action" value="register">

      <div class="form__row">
        @error('password')
          {{ $message }}
        @enderror
        <label for="form-user-register-login" class="form__label">Your email will be your login on website</label>
        <input id="form-user-register-login" type="email" name="email" class="form__input" placeholder="Enter your e-mail" required value="{{ old('email') }}">
      </div>

      <div class="form__row">
        @error('password')
          {{ $message }}
        @enderror
        <label for="form-user-register-password" class="form__label">Create password and confirm it</label>
        <input id="form-user-register-password" type="password" name="password" class="form__input form__input_pw-create" placeholder="Create password" required>
        <input type="password" name="confirm-password" class="form__input form__input_pw-confirm" placeholder="Confirm password">
      </div>

      <div class="form__row">
        @error('name')
          {{ $message }}
        @enderror
        <label for="form-user-register-name" class="form__label">Your name will be show on website</label>
        <input id="form-user-register-name" type="text" name="name" class="form__input" placeholder="Enter your name" required value="{{ old('email') }}">
      </div>

      <div class="form__row form__row_footer">
        <input type="submit" class="form__submit button button_solid" value="Sign up">
      </div>
    </form>

    <div class="content-block_register__text">
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit cumque architecto harum hic nostrum veritatis dolores nesciunt molestias unde, accusamus, mollitia ratione? Dolores, incidunt neque?</p>
      <p>Optio ullam, rerum porro quis totam consequatur repudiandae at. Quam iusto modi, maxime, iure ad ullam aliquam deleniti vitae obcaecati, omnis ducimus? Tempore, dolores. Vitae!</p>
      <p>Odit odio hic neque nihil voluptatum nobis possimus nisi recusandae cumque corrupti! Sunt, necessitatibus ducimus, ea praesentium error rerum nobis eos non eius earum eum?</p>
    </div>
  </div>
@endsection