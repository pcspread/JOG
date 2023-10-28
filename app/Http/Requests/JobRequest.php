<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:191'],
            'content' => ['required', 'string'],
            'email' => ['required', 'email', 'string', 'max:191'],
            'tel' => ['required', 'regex:/[0-9]{10,11}/'],
            'salary' => ['required', 'string'],
            'time' => ['required', 'string'],
            'shift' => ['required', 'string'],
            'location' => ['required', 'string', 'max:191'],
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
            'name.required' => '企業名を入力してください',
            'name.string' => '企業名は文字列で入力してください',
            'name.max' => '企業名は191文字以内で入力してください',
            'content.required' => '企業内容を入力してください',
            'content.string' => '企業内容は文字列で入力してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスを正しい形式で入力してください',
            'email.string' => 'メールアドレスは文字列で入力してください',
            'email.max' => 'メールアドレスは191文字以内で入力してください',
            'tel.required' => '電話番号を入力してください',
            'tel.regex' => '電話番号は10~11文字の数字で入力してください',
            'salary.required' => '給料内容を入力してください',
            'salary.string' => '給料内容は文字列で入力してください',
            'time.required' => '時間内容を入力してください',
            'time.string' => '時間内容は文字列で入力してください',
            'shift.required' => 'シフト内容を入力してください',
            'shift.string' => 'シフト内容は文字列で入力してください',
            'location.required' => '勤務場所を入力してください',
            'location.string' => '勤務場所は文字列で入力してください',
            'location.max' => '勤務場所は191文字以内で入力してください',
        ];
    }
}
