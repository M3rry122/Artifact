<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Controllers\RepliesController;

class ReplyRequest extends FormRequest
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
            'name' => 'required|max:40',
            'body' => 'required|max:300',
        ];
    }
    /**
     * エラーメッセージを日本語化
     * 
     */
    public function messages()
    {
        return [
            'name.required' => '名前を入力してください',
            'name.max' => '名前は40文字以内で入力してください',
            'body.required' => 'コメント本文を入力してください',
            'body.max' => 'コメント本文は350文字以内で入力してください',
        ];
    }
}
