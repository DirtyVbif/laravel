@extends('page')

@section('content')
  @php
    $article_categories = old('categories') ? old('categories') : null;
    $article_title = old('title') ? old('title') : null;
    $article_summary = old('summary') ? old('summary') : null;
    $article_content = old('content') ? old('content') : null;
  @endphp

  @isset($article)      
    @php
      $article_categories = $article->categories;
      $article_title = $article->title;
      $article_summary = $article->summary;
      $article_content = $article->content;
    @endphp
  @endisset

  <form action="{{ $form->url }}" method="POST" class="form" id="form-news-article">
    
    @csrf
    @method($form->method)
    <input type="hidden" name="action" value="{{ $form->action }}">
    
    <div class="form__row js-category-selection-box">
      @include('chunks/form-field-error', ['field_name' => 'categories'])
      <select class="form__input js-select-category">
        @foreach ($categories as $item)
          <option value="{{ $item->entid }}">{{ $item->human_name }}</option>
        @endforeach
        <option value="0" disabled selected>--- категория ---</option>
      </select>

      <input type="hidden" name="categories" value="{{ $article_categories }}" required>

      <div class="js-selected-categories"></div>
    </div>

    <div class="form__row">
      @include('chunks/form-field-error', ['field_name' => 'title'])
      <input type="text" name="title" class="form__input" placeholder="Заголовок" required value="{{ $article_title }}">
    </div>

    <div class="form__row">
      @include('chunks/form-field-error', ['field_name' => 'summary'])
      <textarea name="summary" class="form__input form__input_smallarea" placeholder="Анонс (необязательно)">{{ $article_summary }}</textarea>
    </div>

    <div class="form__row">
      @include('chunks/form-field-error', ['field_name' => 'content'])
      <textarea name="content" class="form__input form__input_area" placeholder="Текст новости" required>{{ $article_content }}</textarea>
    </div>

    <div class="form__row form__row_footer">
      <input type="submit" class="form__submit button button_solid" value="Сохранить">
    </div>
  </form>
@endsection