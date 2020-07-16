@extends('page')

@section('content')
  <div class="news-article">
    @if(true)
      {{-- case if user has rights for editing articles --}}
      <ul class="admin-actions">
        <li class="admin-actions__item">
          <a href="/admin/news/{{ $article->entid }}/edit" class="admin-actions__link admin-actions__link_edit">Редактировать</a>
        </li>
        <li class="admin-actions__item">
          @include('chunks/delete-form', ['form_action' => "/admin/news/{$article->entid}"])
        </li>
      </ul>
    @endif
    <header class="news-article__header">
      <span class="news-article__date">{{ $article->created }}</span>
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
                <a href="{{ route('news/category', ['category' => $item->name]) }}" class="news-article__categories-link">{{ $item->human_name }}</a>
              </li>
            @endforeach
          </ul>
        </div>
      @endisset
    </footer>
  </div>
@endsection