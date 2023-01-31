<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateExpertpeople extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'centerabout_id' => 'required',
            'title_ru' => 'required|max:255',
            'title_uz' => 'required|max:255',
            'title_en' => 'required|max:255',
            'contact_ru' => 'required',
            'contact_uz' => 'required',
            'contact_en' => 'required',
            'content_ru' => 'required',
            'content_uz' => 'required',
            'content_en' => 'required',
            'biography_ru' => 'required',
            'biography_uz' => 'required',
            'biography_en' => 'required',
            'publication_ru' => 'required',
            'publication_uz' => 'required',
            'publication_en' => 'required',
            'is_director' => ''
        ];
    }
}
