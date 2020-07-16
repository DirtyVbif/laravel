@extends('page')

@section('content')
  <x-news-nav-links></x-news-nav-links>
  
  @include('chunks/news-list')
@endsection