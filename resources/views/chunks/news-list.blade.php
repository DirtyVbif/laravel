@isset($news)
  <ul class="news-wrapper">
    @foreach ($news as $item)
      <li class="news-wrapper__row">        
        @include('chunks/article-teaser', [
          'class' => 'news-block',
          'id' => $item->entid,
          'item' => $item
        ])
      </li>
    @endforeach
  </ul>
@endisset