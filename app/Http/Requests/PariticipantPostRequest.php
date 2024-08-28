<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PariticipantPostRequest extends FormRequest
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
            "email"     => "required|unique:participants|email",
            "password"  => "required|min:6",
            "username"  => "required",
        ];
    }

    public function messages(): array
    {
        return [
            'email.required'    => 'Email là bắt buộc',
            'email.unique'      => 'Email đã tồn tại',
            'email.email'       => 'Trường này phải là email',
            'password.required' => 'Mật khẩu là bắt buộc',
            'password.min'      => 'Mật khẩu ít nhất 6 ký tự',
            'username.required' => 'Username là bắt buộc',
        ];
    }
}
