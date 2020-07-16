<form action="{{ route('about') }}" method="POST" class="form" id="form-create-article">

  @csrf

  <div class="form__row">
    @include('chunks/form-field-error', ['field_name' => 'author'])
    <input type="text" name="author" class="form__input" placeholder="Имя отправителя" required value="{{ old('author') }}">
  </div>

  <div class="form__row">
    @include('chunks/form-field-error', ['field_name' => 'email'])
    <input type="email" name="email" class="form__input" placeholder="Ваш e-mail" value="{{ old('email') }}">
  </div>

  <div class="form__row">
    @include('chunks/form-field-error', ['field_name' => 'content'])
    <textarea name="content" class="form__input form__input_area" placeholder="Сообщение" required>{{ old('content') }}</textarea>
  </div>

  <div class="form__row form__row_footer flex flex_row flex_space-around">
    <input type="submit" class="form__submit button button_solid" value="Отправить">
  </div>
</form>