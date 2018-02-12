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
            //
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Attention, champ vide',
            'year.required' => 'Attention, champ vide',
            'runtime.required' => 'Attention, champ vide',
            'director.required' => 'Attention, champ vide',
            'writers.required' => 'Attention, champ vide',
            'actors.required' => 'Attention, champ vide',
            'plot.required' => 'Attention, champ vide',
            'awards.required' => 'Attention, champ vide',
            'poster.required' => 'Attention, champ vide',
            'imdb_id.required' => 'Attention, champ vide',
            'production.required' => 'Attention, champ vide',
            'website.required' => 'Attention, champ vide',
            'genre.required' => 'Attention, champ vide',
            'status.required' => 'Attention, champ vide'

        ];
    }
}
