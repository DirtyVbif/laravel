<article class="{{ $class }}">
  <a href="{{ route('news/article', ['news' => $item->entid]) }}" class="{{ $class }}__link">
    <img src="/img/news-default-image.jpg" alt="article teaser" class="{{ $class }}__image">
    <h3 class="{{ $class }}__title">{{ $item->title }}</h3>
  </a>
  <div class="{{ $class }}__text">
    {{ $item->summary }}
  </div>
  <footer class="{{ $class }}__footer">
    <span class="{{ $class }}__date">{{ $item->created }}</span>
  </footer>
</article>