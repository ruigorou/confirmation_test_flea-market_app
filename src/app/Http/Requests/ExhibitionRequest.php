<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExhibitionRequest extends FormRequest
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
           'image' => 'required|mimes:jpeg,png',
           'category_id' => 'required',
           'condition_id' => 'required',
           'product_name' => 'required',
           'product_description' => 'required|max:255',
           'price' => 'required|integer|min:0',
        ];
    }

     public function messages()
    {
        return [
            'image.required' => '画像を選択してください。',
            'image.mimes' => '拡張子が.jpegもしくは.png',
            'category_id.required' => 'カテゴリーを選択してください',
            'condition_id.required' => '商品状態を選択してください',
            'product_name.required' => '商品名を入力してください',
            'product_description.required' => '商品説明を入力してください',
            'product_description.max' => '255文字以内で入力してください',
            'price.required' => '価格を入力してください',
            'price.integer' => '整数で入力してください',
            'price.min' => '０円以上で入力してください',
        ];
    }
}
