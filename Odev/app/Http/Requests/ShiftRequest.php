<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShiftRequest extends FormRequest
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
            'employee_sicil_no' => 'required|exists:employees,sicil_no',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:baslangic_saati',
            'shift_type' => 'required|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'employee_sicil_no.required' => 'Personel Sicil Numarası zorunludur.',
            'employee_sicil_no.exists' => 'Geçerli bir Personel Sicil Numarası seçiniz.',

            'start_time.required' => 'Başlangıç saati zorunludur.',
            'start_time.date_format' => 'Geçerli bir saat formatı giriniz.',

            'end_time.required' => 'Bitiş saati zorunludur.',
            'end_time.date_format' => 'Geçerli bir saat formatı giriniz.',
            'end_time.after' => 'Bitiş saati, başlangıç saatinden sonra olmalıdır.',

            'shift_type.required' => 'Lokasyon zorunludur.',
            'shift_type.string' => 'Lokasyon karakterlerden oluşmalıdır.',
            'shift_type.max' => 'Lokasyon maksimum 255 karakter içermelidir.',

        ];
    }
}
