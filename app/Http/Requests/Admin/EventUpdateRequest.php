<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class EventUpdateRequest extends FormRequest
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
            'title' => 'required|string',
            'file' => 'required|array|max:7', //count
            'file.*' => 'required|file|mimes:png,jpg|max:4096', //mb
            'short_description' => 'required|string',
            'promo_code' => 'required|string',
            'start_date' => 'required|date',
            'raised_amount' => 'required|numeric|min:0|max:99999',
            'goal_amount' => 'required|numeric|min:0|max:99999',
        ];
    }
}
