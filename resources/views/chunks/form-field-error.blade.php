@if (isset($errors) && $errors->get($field_name))
  <ul class="errors form__errors">
    @foreach ($errors->get($field_name) as $err_msg)
      <li class="errors__item">{!! $err_msg !!}</li>
    @endforeach
  </ul>
@endif