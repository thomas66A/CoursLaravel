<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewProductRequest extends FormRequest
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
            'title'=>'required|max:20',
            'description'=>'required',
            'reference' => 'required|unique:products|alpha_num',
            'prix' => 'required|numeric',
            //'file' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Un titre est requis',
            'description.required'  => 'N\'oublier pas de decrire votre objet',
            'prix.required' => 'Prix est obligatoire',
            'prix.numeric' => 'Ne pas mettre le symbole monétaire. \n Ou utiliser le point au lieu de la virgule',
        ];
    }
}
