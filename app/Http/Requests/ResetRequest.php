<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'password' => ['required', 'min:8', 'max:191', 'regex:/^[0-9A-Za-z]+$/'],
            'password_confirmation' => ['required', 'min:8', 'max:191', 'regex:/^[0-9A-Za-z]+$/'],
        ];
    }

    /**
     * バリデーションメッセージの修正
     * @param void
     * @return array
     */
    public function messages()
    {
        return [
            'password.required' => 'パスワードを入力してください',
            'password.min' => 'パスワードは8文字以上で入力してください',
            'password.max' => 'パスワードは191文字以内で入力してください',
            'password.regex' => 'パスワードは半角英数字で入力してください',
            'password_confirmation.required' => '確認用パスワードを入力してください',
            'password_confirmation.min' => '確認用パスワードは8文字以上で入力してください',
            'password_confirmation.max' => '確認用パスワードは191文字以内で入力してください',
            'password_confirmation.regex' => '確認用パスワードは半角英数字で入力してください',
        ];
    }
}
