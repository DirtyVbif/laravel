<ul class="news-wrapper">
  @foreach ($news as $item)
    <li class="news-block">
      @php
        $data = [
          'class' => 'news-block',
          'id' => $item['id'],
          'item' => $item,
          'category' => $item['category'],
        ];
        if(isset($item['category_name'])) {
          $data['category_name'] = $item['category_name'];
        }
      @endphp
      
      @include('chunks/article-teaser', $data)
    </li>
  @endforeach
</ul>