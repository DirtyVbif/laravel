<a href="{{ route('news/article', ['id' => $id, 'category' => $category]) }}" class="{{ $class }}__link">
  <img src="/img/news-default-image.jpg" alt="article teaser" class="{{ $class }}__image">
  <h3 class="{{ $class }}__title">{{ $item['title'] }}</h3>
</a>
<div class="{{ $class }}__text">{!! $item['summary'] !!}</div>
@isset($category_name)
  <div class="{{ $class }}__tag">{{ $category_name }}</div>
@endisset