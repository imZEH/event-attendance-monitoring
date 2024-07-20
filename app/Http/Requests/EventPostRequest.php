<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class EventPostRequest extends FormRequest
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
            'eventName' => 'required|string',
            'location' => 'nullable|string',
            'description' => 'nullable|string',
            'eventStartDate' => 'required|date',
            'eventEndDate' => 'required|date',
            'startTimeAM' => 'required|string',
            'endTimeAM' => 'required|string',
            'gracePeriodAM' => 'required|int',
            'startTimePM' => 'required|string',
            'endTimePM' => 'required|string',
            'gracePeriodPM' => 'required|int',
            'userId' => 'int',
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
