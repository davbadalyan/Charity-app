<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MainSliderUpdateRequest extends FormRequest
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
            'file' => 'required|array|max:7', //count
            'name' => 'required|string|max:191'
        ];
    }
}
