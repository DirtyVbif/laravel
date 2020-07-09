<article class="feedbacks-list-wrapper">
  <h3>Последние отзывы пользователей:</h3>
  <ul class="feedbacks-list">
    @foreach ($feedbacks as $item)
      <li class="feedbacks-list__item">
        <header class="feedbacks-list__item-header">
          <span class="feedbacks-list__author">{{ $item->author }}</span>
          @if ($item->email)
            <span class="feedbacks-list__email">{{ $item->email }}</span>
          @endif
          <span class="feedbacks-list__date">{{ $item->date }}</span>
        </header>
        <p class="feedbacks-list__text">{{ $item->content }}</p>
      </li>
    @endforeach
  </ul>
</article>