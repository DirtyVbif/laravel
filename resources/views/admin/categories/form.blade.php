@extends('page')

@section('content')
  @php
    $category_name = old('name') ? old('name') : null;
    $category_human_name = old('human_name') ? old('human_name') : null;
  @endphp

  @isset($category)
    @php
      $category_name = $category->name;
      $category_human_name = $category->human_name;
    @endphp
  @endisset

  <form action="{{ $form->url }}" method="POST" class="form" id="form-category">
    
    @csrf
    @method($form->method)
    <input type="hidden" name="action" value="{{ $form->action }}">

    <div class="form__row">
      @include('chunks/form-field-error', ['field_name' => 'human_name'])
      <input type="text" name="human_name" class="form__input" placeholder="Имя категории" required value="{{ $category_human_name }}">
    </div>

    <div class="form__row">
      @include('chunks/form-field-error', ['field_name' => 'name'])
      <input type="text" name="name" class="form__input" placeholder="machine name" required value="{{ $category_name }}">
    </div>

    <div class="form__row form__row_footer">
      <input type="submit" class="form__submit button button_solid" value="Сохранить">
    </div>
  </form>
@endsection