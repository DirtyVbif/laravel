<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
      'name' => ['required', 'string', 'min:2', 'regex:/[a-zA-Z_]+/'],
      'human_name' => ['required', 'string', 'min:2', 'regex:/[\w+\-\s]*/']
    ];
  }

  /**
   * Get custom attributes for validator errors.
   *
   * @return array
   */
  public function attributes()
  {
    return [
      'name' => '<i>machine_name</i>',
      'human_name' => '<i>Название категории</i>'
    ];
  }
}
