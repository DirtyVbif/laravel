@extends('admin')

@section('content')
  <ul class="admin-list admin-list_users">
    <li class="admin-list__item admin-list__item_header admin-list_users__item admin-list_users__item_header">
      <span>{{ t('User name') }}</span>
      <span>{{ t('E-mail') }}</span>
      <span>{{ t('Status') }}</span>
      <span>{{ t('Register date') }}</span>
    </li>

    @foreach ($users as $item)
      <li class="admin-list__item admin-list_users__item">
        <a href="/admin/user/{{ $item->id }}/edit" class="admin-list_users__name">{{ $item->name }}</a>
        <span>{{ $item->email }}</span>
        <span>{{ $item->status }}</span>
        <span>{{ $item->created_at }}</span>
        <a href="/admin/user/{{ $item->id }}/edit" class="admin-list_users__link-edit">{{ t('Edit') }}</a>
        <a href="#" class="admin-list_users__link-delete">{{ t('Delete') }}</a>
      </li>
    @endforeach
</ul>
@endsection