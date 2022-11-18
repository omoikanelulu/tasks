<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|max:30',
            'description' => ' required|max:200',
            'expiration_date' => 'required|date',
            'completion_date' => 'nullable|date',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'タイトルは必須入力です',
            'title.max' => 'タイトルは30文字以内で入力してください',
            'description.required' => '説明は必須入力です',
            'description.max' => '説明は200文字以内で入力してください',
            'expiration_date.required' => '期限日は必須入力です',
            'expiration_date.date' => '期限日は日付の形式で入力してください',
            'completion_date.date' => '完了日は日付の形式で入力してください',
        ];
    }
}
