<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutRequest extends FormRequest
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
            'description' => 'nullable',
            'policy' => 'nullable',
            'title1' => 'nullable',
            'value1' => 'nullable',
            'title2' => 'nullable',
            'value2' => 'nullable',
            'title3' => 'nullable',
            'value3' => 'nullable',
            'title4' => 'nullable',
            'value4' => 'nullable',
            'terms'  => 'nullable',
        ];
    }
}
