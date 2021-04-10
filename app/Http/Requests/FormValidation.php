<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormValidation extends FormRequest
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

            'dealer_location' => 'required|',
            'dealer_name' => 'required',
           
           
            
            //
        ];
       
    }
    public function messages()
    {
        return 
        [
            'dealer_location.required'=> 'Company location field is required',
            'dealer_name.required'=> 'Company name field is required',
           
        ];
    }
}
