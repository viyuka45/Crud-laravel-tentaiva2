<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'titulo'=>'required',
            'ano'=>'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'titulo.required' => 'Coloque o título!',
            'ano.numeric'  => 'Coloque números para as páginas.',
        ];
    }
}