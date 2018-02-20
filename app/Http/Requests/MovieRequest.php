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


    // public function response(array $errors)
    //     {
    //         // Optionally, send a custom response on authorize failure
    //         // (default is to just redirect to initial page with errors)
    //         //
    //         // Can return a response, a view, a redirect, or whatever else
    //
    //         if ($this->ajax() || $this->wantsJson())
    //         {
    //             return new JsonResponse($errors, 422);
    //         }
    //         return $this->redirector->to('/dashboard/save-movie')
    //              ->withInput($this->except($this->dontFlash))
    //              ->withErrors($errors, $this->errorBag);
    //     }

    public function messages()
    {
        return [


        ];
    }
}
