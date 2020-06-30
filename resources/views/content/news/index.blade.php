@extends('page')

@section('content')
  <div>
    <h2 class="text-center">Категории</h2>
    <ul class="news-categories">
      @foreach ($categories as $id => $item)
        <li class="news-categories__item">
          <a href="{{ route('news/category', ['category' => $id]) }}" class="news-categories__link">{{ $item['name'] }}</a>
        </li>
      @endforeach
      <li class="news-categories__item">
        <a href="{{ route('news/create') }}" class="news-categories__link-add button button_ghost">+ Add news</a>
      </li>
    </ul>
  </div>
  
  <div>
    <h2 class="text-center">Новости</h2>
    @include('chunks/news-list')
  </div>
@endsection