<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentRequest extends FormRequest
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
            'görev_adi_kisaltmasi' => 'required|string|max:255',
            'görev_adi' => 'required|string|max:255',
            'gorev_unvani' => 'required|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'görev_adi_kisaltmasi.required' => 'Görev unvanı zorunludur.',
            'görev_adi_kisaltmasi.string' => 'Görev unvanı karakterlerden oluşmalıdır.',
            'görev_adi_kisaltmasi.max' => 'Görev unvanı maksimum 255 karakter içermelidir.',

            'görev_adi.required' => 'Görev unvanı zorunludur.',
            'görev_adi.string' => 'Görev unvanı karakterlerden oluşmalıdır.',
            'görev_adi.max' => 'Görev unvanı maksimum 255 karakter içermelidir.',

            'gorev_unvani.required' => 'Görev unvanı zorunludur.',
            'gorev_unvani.string' => 'Görev unvanı karakterlerden oluşmalıdır.',
            'gorev_unvani.max' => 'Görev unvanı maksimum 255 karakter içermelidir.',

        ];
    }
}
