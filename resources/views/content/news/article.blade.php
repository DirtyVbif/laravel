@extends('page')

@section('content')
  <div class="news-article">
    <header class="news-article__header">
      <span class="news-article__date">{{ $article->date }}</span>
    </header>

    <div class="news-article__content">
      {!! $article->content !!}
    </div>

    <footer class="news-article__footer">
      @isset($categories)
        <div class="news-article__categories">
          <h3 class="news-article__categories-title">Категории:</h3>
          <ul class="news-article__categories-list">
            @foreach ($categories as $item)
              <li class="news-article__categories-list-item">
                <a href="{{ route('news/category', ['name' => $item->name]) }}" class="news-article__categories-link">{{ $item->title }}</a>
              </li>
            @endforeach
          </ul>
        </div>
      @endisset
    </footer>
  </div>
@endsection