<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicantRequest extends FormRequest
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
            'image' => ['required', 'image'],
            'name' => ['required', 'string', 'max:191'],
            'email' => ['required', 'email', 'string', 'max:191'],
            'postcode' => ['required', 'regex:/[0-9]{3}-[0-9]{4}/'],
            'address' => ['required', 'string', 'max:191'],
            'building' => ['nullable', 'string', 'max:191'],
            'age' => ['required', 'integer'],
            'tel' => ['required', 'regex:/[0-9]{10,11}/'],
            'appeal' =>['required', 'string'],
            'reason' => ['required', 'string'],
            'experience' => ['string', 'nullable'],
            'question' => ['string', 'nullable'],
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
            'image.required' => '証明写真を選択してください',
            'image.image' => '写真を選択してください',
            'name.required' => '氏名を入力してください',
            'name.string' => '氏名は文字列で入力してください',
            'name.max' => '氏名は191文字以内で入力してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスを正しい形式で入力してください',
            'email.string' => 'メールアドレスは文字列で入力してください',
            'email.max' => 'メールアドレスは191文字以内で入力してください',
            'postcode.required' => '郵便番号を入力してください',
            'postcode.regex' => '郵便番号を正しい形式で入力してください',
            'address.required' => '住所を入力してください',
            'address.string' => '住所は文字列で入力してください',
            'address.max' => '住所は191文字以内で入力してください',
            'building.string' => '建物の名前は文字列で入力してください',
            'building.max' => '建物の名前は191文字以内で入力してください',
            'age.required' => '年齢を入力してください',
            'age.integer' => '年齢は数字で入力してください',
            'tel.required' => '電話番号を入力してください',
            'tel.regex' => '電話番号を正しい形式で入力してください',
            'appeal.required' => 'アピール内容を入力してください',
            'appeal.string' => 'アピール内容は文字列で入力してください',
            'reason.required' => '志望動機を入力してください',
            'reason.string' => '志望動機は文字列を入力してください',
            'experience.string' => 'アルバイト経験は文字列で入力してください',
            'question.string' => '質問内容は文字列で入力してください',
        ];
    }
}
