<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'kadro_adi_kisaltma' => 'required|string|max:255',
            'kadro_adi' => 'required|string|max:255',
            'görev_unvani' => 'required|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'kadro_adi_kisaltma.required' => 'Görev unvanı zorunludur.',
            'kadro_adi_kisaltma.string' => 'Görev unvanı karakterlerden oluşmalıdır.',
            'kadro_adi_kisaltma.max' => 'Görev unvanı maksimum 255 karakter içermelidir.',

            'kadro_adi.required' => 'Görev unvanı zorunludur.',
            'kadro_adi.string' => 'Görev unvanı karakterlerden oluşmalıdır.',
            'kadro_adi.max' => 'Görev unvanı maksimum 255 karakter içermelidir.',

            'görev_unvani.required' => 'Görev unvanı zorunludur.',
            'görev_unvani.string' => 'Görev unvanı karakterlerden oluşmalıdır.',
            'görev_unvani.max' => 'Görev unvanı maksimum 255 karakter içermelidir.',

        ];
    }
}
