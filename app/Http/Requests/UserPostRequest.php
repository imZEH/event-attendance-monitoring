<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserPostRequest extends FormRequest
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
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'middlename' => 'string',
            'studentId' => 'nullable|string',
            'birthday' => 'nullable|string',
            'yearlevel' => 'nullable|string',
            'course' => 'nullable|string',
            'userType' => 'string',
            'userId' => 'int',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|min:8'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();

        $response = response()->json([
            'success' => false,
            'message' => 'Validation failed',
            'errors' => $errors
        ], 422);

        throw new HttpResponseException($response);
    }
}
