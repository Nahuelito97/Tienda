<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name'=>'string|required|unique:products|max:255',
            'image'=>'required|dimensions:min_width=100,min_height=200',
            'sell_price'=>'required',
            'category_id'=>'integer|required|exists:App\Category,id',
            'provider_id'=>'integer|required|exists:App\Prodvider,id',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Este campo es requerido',
            'name.string'=>'El valor no es correcto',
            'name.unique'=>'Este producto ya se encuentra registrado',
            'name.max'=>'Solo se permiten 255 caracteres',

            'image.required'=>'Este campo es requerido',
            'image.dimensions'=>'Solo se permiten imagenes de 100x200 px.',

            'sell_price.required' => 'El campo es requerido',

            'category_id.integer'=>'El valor tiene que ser entero',
            'category_id.required'=>'El campo es requerido',
            'category_id.exists'=>'La categoria no existe',

            'provider_id.integer'=>'El valor tiene que ser entero',
            'provider_id.required'=>'El campo es requerido',
            'provider_id.exists'=>'El proveedor no existe',

        ];
    }
}
