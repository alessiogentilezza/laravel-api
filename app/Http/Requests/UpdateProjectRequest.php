<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProjectRequest extends FormRequest
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
            'title' => ['required', 'max:150', Rule::unique('projects')->ignore($this->project)],

            // 'title' => 'required', 'max:150',
            'link' => 'required|max:150',
            'content' => 'nullable|min:10|max:2000',
            'cover_image' => 'required|url|max:255',
            'type_id' => 'nullable|exists:types,id',
            'technologies' => 'exists:technologies,id'

        ];
    }
}
