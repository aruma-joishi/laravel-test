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
            'lastname' => ['required'],
            'firstname' => ['required'],
            'gender' => ['required'],
            'email' => ['required', 'email'],
            'firsttel'=> ['required','integer','digits_between:1,5'],
            'middletel'=> ['required','integer','digits_between:1,5'],
            'lasttel'=> ['required','integer','digits_between:1,5'],
            'address'=> ['required'],
            'inquiry'=>['required'],
            'detail'=> ['required','max:120']
        ];
    }
    public function messages()
    {
        return [
            'lastname.required' => '姓を入力してください',
            'firstname.required' => '名を入力してください',
            'gender.required'=> '性別を選択してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスはメール形式で入力してください',
            'firsttel.required' => '電話番号を入力してください',
            'lasttel.required' => '電話番号を入力してください',
            'middletel.required'=> '電話番号を入力してください',
            'firsttel.integer'=> '電話番号は5桁までの数字で入力してください',
            'middletel.integer'=> '電話番号は5桁までの数字で入力してください',
            'lasttel.integer' => '電話番号は5桁までの数字で入力してください',
            'firsttel.digits_between:1,5'=> '電話番号は5桁までの数字で入力してください',
            'middletel.digits_between:1,5'=>'電話番号は5桁までの数字で入力してください',
            'lasttel.digits_between:1,5'=>'電話番号は5桁までの数字で入力してください',
            'address.required'=> '住所を入力してください',
            'inquiry.required'=>'お問い合わせの種類を選択してください',
            'detail.required' => 'お問い合わせ内容を入力してください',
            'detail.max:120'=>'お問い合わせ内容は120文字以内で入力してください'
        ];
    }

}
