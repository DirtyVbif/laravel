@extends('admin')

@section('content')  
  <ul class="admin-list">
    @foreach ($news as $i => $item)
      <li class="admin-list__item">
        <article class="admin-list-article">
          <h4 class="admin-list-article__title">
            <a href="{{ route('news/article', ['news' => $item]) }}" class="admin-list-article__link">
              {{ strTrim($item->title, 60) }}
            </a>
          </h4>
          <div class="admin-list-article__actions">
            <a href="/admin/news/{{$item->entid}}/edit" class="admin-list-article__link admin-list-article__link_edit button button_ghost">
              Редактировать
            </a>
            @include('chunks/delete-form', ['form_action' => "/admin/news/{$item->entid}"])
          </div>
        </article>
      </li>
    @endforeach
  </ul>
@endsection