@extends('page')

@section('content')
  <form action="{{ route('news') }}" method="POST" class="form" id="form-create-article">
    <div class="form__errors-wrapper">
      @include('chunks/errors')
    </div>
    
    @csrf
    <input type="hidden" name="action" value="create-article">
    
    <div class="form__row">
      <select name="category" id="form-create-article-category" class="form__input" required>
        @php $selected = ' selected'; @endphp
        @foreach ($categories as $item)
          @if ($item->id === old('category'))
            <option value="{{ $item->id }}" selected>{{ $item->title }}</option>
            @php $selected = ''; @endphp
          @else
            <option value="{{ $item->id }}"{{ $selected }}>{{ $item->title }}</option>
          @endif
        @endforeach
        <option value="" disabled selected>--- категория ---</option>
      </select>
    </div>

    <div class="form__row">
      <input type="text" name="title" class="form__input" placeholder="Заголовок" required value="{{ old('title') }}">
    </div>

    <div class="form__row">
      <textarea name="summary" class="form__input form__input_smallarea" placeholder="Анонс (необязательно)" value="{{ old('summary') }}"></textarea>
    </div>

    <div class="form__row">
      <textarea name="content" class="form__input form__input_area" placeholder="Текст новости" required>{{ old('content') }}</textarea>
    </div>

    <div class="form__row form__row_footer">
      <input type="submit" class="form__submit button button_solid" value="Добавить">
    </div>
  </form>
@endsection