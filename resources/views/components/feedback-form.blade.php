<form action="{{ route('about') }}" method="POST" class="form" id="form-create-article">
  <div class="form__errors-wrapper">
    @include('chunks/errors')
  </div>

  @csrf
  <input type="hidden" name="action" value="post-feedback">

  <div class="form__row">
    <input type="text" name="author" class="form__input" placeholder="Your name" required value="{{ old('author') }}">
  </div>

  <div class="form__row">
    <input type="email" name="email" class="form__input" placeholder="Your e-mail" value="{{ old('email') }}">
  </div>

  <div class="form__row">
    <textarea name="content" class="form__input form__input_area" placeholder="Type your comment" required>{{ old('content') }}</textarea>
  </div>

  <div class="form__row form__row_footer flex flex_row flex_space-around">
    <input type="submit" class="form__submit button button_solid" value="Send feedback">
    <a href="/api/feedbacks" class="button button_ghost">Get feedbacks via api</a>
  </div>
</form>