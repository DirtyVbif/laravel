<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeedbackRequest extends FormRequest
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
            'author' => ['required', 'string', 'min:2'],
            'email' => ['email:filter'],
            'content' => ['required', 'string', 'min:4']
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Поле ":attribute" необходимо для заполнения.'
        ];
    }

    public function attributes()
    {
        return [
            'author' => 'имя',            
            'email' => 'адрес электронной почты',
            'content' => 'текст комментария'
        ];
    }
}
