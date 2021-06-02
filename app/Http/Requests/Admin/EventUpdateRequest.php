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
            'file' => 'nullable|file|mimes:png,jpg|max:4096', //mb
            'short_description' => 'required|string',
            'promo_code' => 'required|string',
            'start_date' => 'required|date',
            'raised_amount' => 'required|numeric|min:0|max:99999',
            'goal_amount' => 'required|numeric|min:0|max:99999',
        ];
    }

    public function uploadFileGetName(): string
    {
        if ($this->hasFile('file')) {
            $file = $this->file('file');
            // dd($file);
            $name = time() . '.' . $file->getClientOriginalExtension();
            $file->storePubliclyAs('/public/images', $name);
        }

        return $name ?? '';
    }
}
