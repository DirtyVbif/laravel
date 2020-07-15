@isset($errors)
  @if (!empty($errors->all()))
    <ul class="errors-list">
      @foreach ($errors->all() as $error)
        <li class="errors-list__item">{{ $error }}</li>
      @endforeach
    </ul>    
  @endif
@endisset