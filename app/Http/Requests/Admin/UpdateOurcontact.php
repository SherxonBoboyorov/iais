<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOurcontact extends FormRequest
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
            'phone_number' => 'required|max:50',
            'fax' => 'required|max:255',
            'email' => 'required|max:255',
            'adsress_ru' => 'required|max:255',
            'adsress_uz' => 'required|max:255',
            'adsress_en' => 'required|max:255',
            'landmarks_ru' => 'required|max:255',
            'landmarks_uz' => 'required|max:255',
            'landmarks_en' => 'required|max:255',
        ];
    }
}
