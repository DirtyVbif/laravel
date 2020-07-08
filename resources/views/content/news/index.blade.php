@extends('page')

@section('content')
  @isset($categories)
    <div>
      <h2 class="text-center">Категории</h2>
      <ul class="news-categories">
          @foreach ($categories as $id => $item)
            <li class="news-categories__item">
              <a href="{{ route('news/category', ['name' => $item->name]) }}" class="news-categories__link">{{ $item->title }}</a>
            </li>
          @endforeach
        <li class="news-categories__item">
          <a href="{{ route('news/create') }}" class="news-categories__link-add button button_ghost">+ Add news</a>
        </li>
      </ul>
    </div>
  @endisset
  
  <div>
    <h2 class="text-center">Новости</h2>
    @include('chunks/news-list')
  </div>
@endsection