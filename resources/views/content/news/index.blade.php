@extends('page')

@section('content')
  <div class="news-links">
    <a href="{{ route('news/categories') }}" class="news-categories-wrapper__add-btn button button_ghost">Список категорий</a>
    <a href="{{ route('news/category/create') }}" class="news-categories-wrapper__add-btn button button_ghost">+ Добавить категорию</a>
    <a href="{{ route('news/article/create') }}" class="news-categories-wrapper__add-btn button button_ghost">+ Добавить новость</a>
  </div>

  {{-- @isset($categories)
    <div>
      <h2 class="text-center">Категории</h2>
      <ul class="news-categories">
          @foreach ($categories as $item)
            <li class="news-categories__item">
              <a href="{{ route('news/category', ['name' => $item->name]) }}" class="news-categories__link">{{ $item->title }}</a>
            </li>
          @endforeach
      </ul>
    </div>
  @endisset --}}
  
  <div>
    <h2 class="text-center">Новости</h2>
    @include('chunks/news-list')
  </div>
@endsection