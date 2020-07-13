@extends('page')

@section('content')
  <form action="{{ route('news/article/edit', ['news' => $article->id]) }}" method="POST" class="form" id="form-edit-article">
    <div class="form__errors-wrapper">
      @include('chunks/errors')
    </div>
    
    @csrf
    <input type="hidden" name="action" value="edit-article">
    
    <div class="form__row js-category-selection-box">
      <select class="form__input js-select-category">
        @foreach ($categories as $item)
          <option value="{{ $item->id }}">{{ $item->title }}</option>
        @endforeach
        <option value="0" disabled selected>--- категория ---</option>
      </select>

      <input type="hidden" name="categories" value="{{ $article->categories }}" required>

      <div class="js-selected-categories"></div>
    </div>

    <div class="form__row">
      <input type="text" name="title" class="form__input" placeholder="Заголовок" required value="{{ $article->title }}">
    </div>

    <div class="form__row">
      <textarea name="summary" class="form__input form__input_smallarea" placeholder="Анонс (необязательно)">{{ $article->summary }}</textarea>
    </div>

    <div class="form__row">
      <textarea name="content" class="form__input form__input_area" placeholder="Текст новости" required>{{ $article->content }}</textarea>
    </div>

    <div class="form__row form__row_footer">
      <input type="submit" class="form__submit button button_solid" value="Сохранить">
    </div>
  </form>
@endsection