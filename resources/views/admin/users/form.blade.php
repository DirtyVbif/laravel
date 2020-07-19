@extends('admin')

@section('content')
  <form action="/admin/user/{{ $user->id }}" method="POST" class="form" id="form-user-edit">
    
    @csrf
    @method('PUT')

    <div class="form__row">
      @include('chunks/form-field-error', ['field_name' => 'name'])
      <input type="text" name="name" class="form__input" placeholder="User name" required value="{{ $user->name }}">
    </div>

    <div class="form__row">
      @include('chunks/form-field-error', ['field_name' => 'email'])
      <input type="text" name="email" class="form__input" placeholder="User e-mail" required value="{{ $user->email }}">
    </div>

    <div class="form__row">
      <select name="usid" required class="form__input">
        @foreach ($statuses as $item)
          <option value="{{ $item->usid }}"@if ($item->usid === $user->usid)
            selected
          @endif>{{ $item->status }}</option>
        @endforeach
      </select>
    </div>

    <div class="form__row form__row_footer">
      <input type="submit" class="form__submit button button_solid" value="{{ t('Save') }}">
    </div>
  </form>
@endsection