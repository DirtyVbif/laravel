@extends('page')

@section('content')
  <x-news-nav-links></x-news-nav-links>
  @if (true)
  {{-- case if user has right for editing category --}}
    <p>
      <a href="/admin/category/{{ $category->name }}/edit" class="button button_solid">
        Редактировать "{{ $category->human_name }}"
      </a>
    </p>
  @endif
  @include('chunks/news-list', ['news' => $category->news()])
@endsection