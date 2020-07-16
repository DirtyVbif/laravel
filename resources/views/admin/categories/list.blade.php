@extends('page')

@section('content')
  <x-news-nav-links></x-news-nav-links>
  
  <ul class="admin-list">
    @foreach ($categories as $item)
    <li class="admin-list__item">
      <article class="admin-list-article">
        <h4 class="admin-list-article__title admin-list-article__title_category">
          <a href="{{ route('news/category', ['category' => $item->name]) }}" class="admin-list-article__link">
            {{ $item->human_name }}
          </a>
          <span class="admin-list-article__machine_name">{{ $item->name }}</span>
        </h4>
        <div class="admin-list-article__actions">
          <a href="/admin/category/{{ $item->name }}/edit" class="admin-list-article__link admin-list-article__link_edit button button_ghost">
            Редактировать
          </a>
          @include('chunks/delete-form', ['form_action' => "/admin/category/{$item->name}"])
        </div>
      </li>
    @endforeach
  </ul> 
@endsection