<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|min:5|max:255',
            'slug' => "required|unique:posts",
            'category' => 'required',
            'content' => 'required',
        ];
    }

    // Metodo para personalizar los mensajes de error
    // public function messages()
    // {
    //     return [
    //         'title.required' => 'The :attribute field is required. (edited)',
    //         'slug.required' => 'The :attribute field is required. (edited)',
    //     ];
    // }

    // Cambiar los nombre de los campos en el mensaje de error
    // public function attributes()
    // {
    //     return [
    //         'title' => 'Título',
    //         'slug' => 'Slug',
    //     ];
    // }
}
