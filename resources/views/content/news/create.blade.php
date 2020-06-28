@extends('page')

@section('content')
  <form action="{{ route('news') }}" method="POST" class="form" id="form-create-article">
    @csrf
    <input type="hidden" name="action" value="create-article">

    @isset($categories)
      <div class="form__row">
        <select name="category" id="form-create-article-category" class="form__input" required>
          <option value="" disabled selected>--- категория ---</option>
          @foreach ($categories as $id => $item)
            <option value="{{ $id }}">{{ $item['name'] }}</option>
          @endforeach
        </select>
      </div>
    @endisset

    <div class="form__row">
      <input type="text" name="title" class="form__input" placeholder="News title" required>
    </div>

    <div class="form__row">
      <textarea name="body" class="form__input form__input_area" placeholder="News body" required></textarea>
    </div>

    <div class="form__row form__row_footer">
      <input type="submit" class="form__submit button button_solid" value="Add article">
    </div>
  </form>
@endsection