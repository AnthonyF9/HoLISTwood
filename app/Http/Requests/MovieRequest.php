<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovieRequest extends FormRequest
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
           'title' => 'required',
           'year' => 'required|integer',
           'runtime' => 'required',
           'director' => 'required',
           'writers' => 'required',
           'actors' => 'required',
           'plot' => 'required',
           'poster' => 'required',
           'imdb_id' => 'required',
           'genre' => 'required',
           'status' => 'required'
        ];
    }

    // public function messages()
    // {
    //     return [
    //       'title.required' => 'fdhgxngchgvcjn',
    //
    //     ];
    // }
}
