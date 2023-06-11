<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorCarRequestr extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'cost' => 'required',
            'image' => 'required',
            'number' => 'required',
            'color_id' => 'required',
            'type_id' => 'required',

        ];
    }


    public function messages()
    {
    return [
        'cost.required' => 'Please Enter Cost',
        'image.required' => 'Please Enter Image',
        'number.required'  => 'Please Enter Number',
        'color_id.required'  => 'Please Enter Color of Car',
        'type_id.required'  => 'Please Enter Car Type',
    ];
    }



    
}