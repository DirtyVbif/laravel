@extends('admin')

@section('content')
  <ul class="structure-list structure-list_structure">
    <li class="structure-list__item structure-list_structure__item">
      <article class="structure-list-article">
        <h3 class="structure-list-article__title">
          <a href="/admin/news" class="structure-list-article__link">{{ t('News editing') }}</a>
        </h3>
        <p class="structure-list-article__description">
          {{ t('Manage and edit news articles') }}
        </p>
      </article>
    </li>

    <li class="structure-list__item structure-list_structure__item">
      <article class="structure-list-article">
        <h3 class="structure-list-article__title">
          <a href="/admin/category" class="structure-list-article__link">{{ t('Categories editing') }}</a>
        </h3>
        <p class="structure-list-article__description">
          {{ t('Manage and edit news categories') }}
        </p>
      </article>
    </li>

    @if (isAdmin())
      <li class="structure-list__item structure-list_structure__item">
        <article class="structure-list-article">
          <h3 class="structure-list-article__title">
            <a href="/admin/user" class="structure-list-article__link">{{ t('Users list') }}</a>
          </h3>
          <p class="structure-list-article__description">
            {{ t('Manage and edit users profiles') }}
          </p>
        </article>
      </li>
    @endif
  </ul>
@endsection