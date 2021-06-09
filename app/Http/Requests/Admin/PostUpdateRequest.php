<?php

namespace App\Http\Requests\Admin;

use Astrotomic\Translatable\Validation\RuleFactory;
use Illuminate\Foundation\Http\FormRequest;

class PostUpdateRequest extends FormRequest
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
        $rules = RuleFactory::make([
            '%title%' => 'required|string|max:191',
            '%short_description%' => 'required|string|max:1000',
            '%description%' => 'required|string|max:5000',
        ]);

        return $rules + [
            'file' => 'nullable|array|max:7', //count
            'file.*' => 'nullable|file|mimes:png,jpg|max:4096', //mb
            'event_id' => 'nullable|integer',
        ];
    }
}
