@extends('page')

@section('content')
  <ul class="news-categories">
    @foreach ($categories as $item)
      <li class="news-categories__item">
        <a href="{{ route('news/category', ['name' => $item->name]) }}" class="news-categories__link">{{ $item->title }}</a>
        <a href="{{ route('news/category/delete', ['category' => $item->id]) }}">Удалить</a>
      </li>
    @endforeach
  </ul> 
@endsection