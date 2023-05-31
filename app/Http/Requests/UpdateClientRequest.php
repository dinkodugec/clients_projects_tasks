<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'company_name' => 'bail|required|max:50',
            'company_address' => 'required|max:255',
            'email ' => 'email:rfc,dns',
            'company_city' => 'required|max:50',
            'contact_person' => 'required|max:50',
        ];
    }
}