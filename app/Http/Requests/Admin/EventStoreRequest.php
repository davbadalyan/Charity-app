<?php

namespace App\Http\Requests\Admin;

use Astrotomic\Translatable\Validation\RuleFactory;
use Illuminate\Foundation\Http\FormRequest;

class EventStoreRequest extends FormRequest
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
        ]);

        return $rules + [
            'file' => 'required|array|max:7', //count
            'file.*' => 'required|file|mimes:png,jpg|max:4096', //mb
            'promo_code' => 'required|string',
            'start_date' => 'required|date',
            'raised_amount' => 'required|numeric|min:0|max:99999',
            'goal_amount' => 'required|numeric|min:0|max:99999',
        ];
    }
}
