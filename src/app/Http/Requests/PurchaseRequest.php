<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PurchaseRequest extends FormRequest
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
             'shipping_name' => 'required',
             'payment' => 'required',
             'shipping_postal_code' => 'required',
             'shipping_address' => 'required',
             'price' => 'required'
        ];
    }

     public function messages()
    {
        return [
            'shipping_name.required' => '商品名を入力してください',
            'payment.required' => '支払い方法を選択してください',
            'shipping_postal_code.required' => '郵便番号を入力して下さい',
            'shipping_address.required' => '住所を入力して下さい',
            'price.required' => '金額を入力して下さい',
        ];
    }
}
