<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
            'fname' => 'required|string|max:50',
            "lname" => "required|string|max:50",
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:1024',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'bio' => 'required|string|min:8',

        ];
    }
}
