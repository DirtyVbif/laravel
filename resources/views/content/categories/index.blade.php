@extends('page')

@section('content')
  <x-news-nav-links></x-news-nav-links>
  
  <ul class="news-categories">
    @foreach ($categories as $item)
      <li class="news-categories__item">
        <a href="{{ route('news/category', ['category' => $item->name]) }}" class="news-categories__link">{{ $item->human_name }}</a>
      </li>
    @endforeach
  </ul> 
@endsection