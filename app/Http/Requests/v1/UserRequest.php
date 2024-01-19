<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => ['required'],
            'email_address' => ['sometimes'],
            'google_id' => ['sometimes'],
            'avatar' => ['sometimes'],
            'birthdate' => ['sometimes'],
            'age' => ['sometimes'],
            'sex' => ['sometimes'],
            'marital_status' => ['sometimes'],
            'nationality' => ['sometimes'],
            'ss_number' => ['sometimes'],
            'primary_address'=> ['sometimes'],
            'secondary_address' => ['sometimes'],
            'contact_number_1' => ['sometimes'],
            'contact_number_2' => ['sometimes'],
            'date_hired' => ['sometimes'],
            'employment_status' => ['sometimes'],
            'is_admin' => ['sometimes'],
            'position_id' => ['sometimes'],
        ];
    }
}
