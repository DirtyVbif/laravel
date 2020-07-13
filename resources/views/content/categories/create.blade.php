@extends('page')

@section('content')
  <form action="{{ route('news/category/create') }}" method="POST" class="form" id="form-create-category">
    <div class="form__errors-wrapper">
      @include('chunks/errors')
    </div>
    
    @csrf
    <input type="hidden" name="action" value="create-category">

    <div class="form__row">
      <input type="text" name="human_name" class="form__input" placeholder="Имя категории" required value="{{ old('human_name') }}">
    </div>

    <div class="form__row">
      <input type="text" name="name" class="form__input" placeholder="machine name" required value="{{ old('name') }}">
    </div>

    <div class="form__row form__row_footer">
      <input type="submit" class="form__submit button button_solid" value="Добавить">
    </div>
  </form>
@endsection