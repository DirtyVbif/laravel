<form action="{{ $form_action }}" method="POST" class="delete-form">
  @csrf
  @method('DELETE')
  <input type="submit" value="Удалить" class="delete-form__submit">
</form>