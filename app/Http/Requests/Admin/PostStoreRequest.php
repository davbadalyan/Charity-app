<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
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
            'description' => 'required|string',
            'event_id' => 'nullable|integer',
        ];
    }
}
