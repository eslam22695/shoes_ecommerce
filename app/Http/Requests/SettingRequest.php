<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'phone1' => 'nullable',
            'phone2' => 'nullable',
            'email1' => 'nullable',
            'email2' => 'nullable',
            'address1' => 'nullable',
            'address2' => 'nullable',
            'facebook' => 'nullable',
            'twitter' => 'nullable',
            'youtube' => 'nullable',
            'instagram' => 'nullable',
            'whatsapp' => 'nullable',
            'youtube' => 'nullable',
        ];
    }
}
