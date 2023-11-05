<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'fullname' => 'required|string',
            'email' => 'required|email',
            'postcode' => 'required|regex:/^\d{3}-\d{4}$/',
            'address' => 'required|string',
            'opinion' => 'required|string|max:120',
        ];
    }
    public function messages()
     {
         return [
            'fullname.required' => '名前を入力してください',
            'fullname.string' => '名前を文字列で入力してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.string' => 'メールアドレスを文字列で入力してください',
            'email.email' => '有効なメールアドレス形式を入力してください',
            'email.max' => 'メールアドレスを255文字以下で入力してください',
            'postcode.required' => '郵便番号を入力してください',
            'postcode.regex' => '正しい郵便番号の形式で入力してください (例: 123-4567)',
            'address.required' => '住所を入力してください',
            'address.string' => '住所を文字列で入力してください',
            'opinion.required' => 'ご意見を入力してください',
            'opinion.string' => 'ご意見を文字列で入力してください',
            'opinion.max' => 'ご意見を120文字以下で入力してください',
         ];
     }
}
