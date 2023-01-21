<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateProjectnew extends FormRequest
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
            'expertpeople_id' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg,webp',
            'title_ru' => 'required|max:255',
            'title_uz' => 'required|max:255',
            'title_en' => 'required|max:255',
            'ongoing_name_ru' => 'required|max:255',
            'ongoing_name_uz' => 'required|max:255',
            'ongoing_name_en' => 'required|max:255',
            'description_ru' => 'required',
            'description_uz' => 'required',
            'description_en' => 'required',
            'ongoing_content_ru' => 'required',
            'ongoing_content_uz' => 'required',
            'ongoing_content_en' => 'required',
        ];
    }
}
