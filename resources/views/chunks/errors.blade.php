@isset($errors)
  @if ($messages = $errors->all())
    <ul class="errors-list">
      @foreach ($messages as $message)
        <li class="errors-list__item">{{ $message }}</li>
      @endforeach
    </ul>    
  @endif
@endisset