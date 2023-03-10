<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberRequest extends FormRequest
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
            'name' => 'string|required',
            'phone_number' => 'string|required',
            'email_address' => 'email:rfc',
            'is_employed' => 'boolean',
            'iban' => 'string|required',
            'birthday' => 'date|required',
            'street' => 'string|required',
            'city' => 'string|required',
            'state' => 'string|required',
            'postal_code' => 'int|required'
        ];
    }
}
