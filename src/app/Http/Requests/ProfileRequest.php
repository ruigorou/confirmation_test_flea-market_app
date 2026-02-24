<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'image' => 'mimes:jpeg,png',
            'name' => 'required|max:20',
            'post' => 'required|min:8',
            'address' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'image.mimes' => '拡張子が.jpeg、もしくは.png',
            'name.required' => 'お名前を入力してください',
            'name.max' => '20文字以内で入力してください',
            'post.required' => '郵便番号を入力してください',
            'post.min' => 'ハイフンを含め8文字以内で入力してください',
            'address.required' => '住所を入力してください',
        ];
    }
}
