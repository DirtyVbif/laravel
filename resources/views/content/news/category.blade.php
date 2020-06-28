@extends('page')

@section('content')
  <ul class="news-wrapper">
    @foreach ($items as $id => $item)
      <li class="news-block">
        <a href="{{ route('news/article', ['id' => $id, 'category' => $category]) }}" class="news-block__link">
          <img src="/img/news-default-image.jpg" alt="article teaser" class="news-block__image">
          <h3 class="news-block__title">{{ $item['title'] }}</h3>
        </a>
        <div class="news-block__text">{!! $item['summary'] !!}</div>
      </li>
    @endforeach
    <li class="news-block news-block_add">
      <a href="{{ route('news/create') }}" class="news-categories__link-add button button_ghost">+ Add news</a>
    </li>
  </ul>
@endsection