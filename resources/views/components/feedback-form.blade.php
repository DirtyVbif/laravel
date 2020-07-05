<form action="{{ route('about') }}" method="POST" class="form" id="form-create-article">
  <div class="form__errors-wrapper">
    @include('chunks/errors')
  </div>

  @csrf
  <input type="hidden" name="action" value="feedback">

  <div class="form__row">
    <input type="text" name="user-name" class="form__input" placeholder="Your name" required value="{{ old('user-name') }}">
  </div>

  <div class="form__row">
    <textarea name="body" class="form__input form__input_area" placeholder="Type your comment" required>{{ old('body') }}</textarea>
  </div>

  <div class="form__row form__row_footer flex flex_row flex_space-around">
    <input type="submit" class="form__submit button button_solid" value="Send feedback">
    <a href="/api/feedbacks" class="button button_ghost">Current feedbacks</a>
  </div>
</form>