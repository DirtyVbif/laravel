@extends('page')

@section('content')
  <ul class="news-categories">
    @foreach ($items as $id => $item)
        <li class="news-categories__item">
          <a href="{{ route('news/category', ['category' => $id]) }}" class="news-categories__link">{{ $item['name'] }}</a>
        </li>
    @endforeach
    <li class="news-categories__item">
      <a href="{{ route('news/create') }}" class="news-categories__link-add button button_ghost">+ Add news</a>
    </li>
  </ul>
@endsection