@extends('page')

@section('content')
    <section class="container">
        <h1 class="page-header">{{ $page_title }}</h1>

        <div class="news-wrapper">
            @foreach ($news as $item)
                <div class="news-block">
                    <header class="news-block__header">
                        <a href="#" class="news-block__link">
                            <img src="/img/news-default-image.jpg" alt="news teaser" class="news-block__image">
                            <h3 class="news-block__title">{{ $item['title'] }}</h3>
                        </a>
                    </header>

                    <div class="news-block__text">{!! $item['text'] !!}</div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
