<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Purchaserequest extends FormRequest
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

           
            'maindealer_id' => 'required',
            'item_photo' => 'required',
            'total' => 'required',
            'pay' => 'required'
           
            
            //
        ];
       
    }
    public function messages()
    {
        return 
        [
            
            'maindealer_id.required'=> 'please select the shop or company',
            'item_photo.required'=> 'Bill photo field is required',
            'total.required'=> 'Enter total amount',
            'pay.required'=> 'Enter payable  amount ',
        ];
    }
}
