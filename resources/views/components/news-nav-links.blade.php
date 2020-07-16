<ul class="news-nav-links">
  <li class="news-nav-links__item">
    <a href="{{ route('news/categories') }}" class="news-nav-links__link button button_solid">
      Список категорий
    </a>
  </li>
  @if (true)
    {{-- if uther has right for adding categories and news --}}
    <li class="news-nav-links__item">
      <a href="/admin/category/create" class="news-nav-links__link button button_ghost">
        + Добавить категорию
      </a>
    </li>
    <li class="news-nav-links__item">
      <a href="/admin/category" class="news-nav-links__link button button_ghost">
        Редактировать категории
      </a>
    </li>
    <li class="news-nav-links__item">
      <a href="/admin/news/create" class="news-nav-links__link button button_ghost">
        + Добавить новость
      </a>
    </li>
    <li class="news-nav-links__item">
      <a href="/admin/news" class="news-nav-links__link button button_ghost">
        Редактировать новости
      </a>
    </li>
  @endif
</ul>