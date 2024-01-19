<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmployeeUpdateRequest extends FormRequest
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
        $employeeId = $this->route('employee.updateStatus'); // Bu, güncellenen kaydın ID'sini almak için kullanılır.

        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'departman_adi' => 'required|string|max:255',
            'kimlik_no' => 'required|string|max:255|regex:/^[0-9]{11}$/',
            'adres' => 'required|string|max:255',
            'phone' => 'required|string|max:255|regex:/^\+(?:\d\s?){6,14}\d$/',
            'password' => 'nullable|string|min:8',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Başlık alanı zorunludur.',
            'name.string' => 'Başlık alanı karakterlerden oluşmalıdır.',
            'name.max' => 'Başlık alanı maksimum 255 karakter içermelidir.',

            'email.required' => 'E-posta adresi zorunludur.',
            'email.email' => 'Geçerli bir e-posta adresi giriniz.',
            'email.max' => 'E-posta adresi maksimum 255 karakter içermelidir.',

            'departman_adi.required' => 'Görev unvanı zorunludur.',
            'departman_adi.string' => 'Görev unvanı karakterlerden oluşmalıdır.',
            'departman_adi.max' => 'Görev unvanı maksimum 255 karakter içermelidir.',

            'kimlik_no.required' => 'Kimlik numarası zorunludur.',
            'kimlik_no.string' => 'Kimlik numarası karakterlerden oluşmalıdır.',
            'kimlik_no.max' => 'Kimlik numarası maksimum 255 karakter içermelidir.',
            'kimlik_no.regex' => 'Geçerli bir TC Kimlik Numarası giriniz.',

            'adres.required' => 'Adres zorunludur.',
            'adres.string' => 'Adres karakterlerden oluşmalıdır.',
            'adres.max' => 'Adres maksimum 255 karakter içermelidir.',

            'phone.required' => 'Telefon numarası zorunludur.',
            'phone.string' => 'Telefon numarası karakterlerden oluşmalıdır.',
            'phone.regex' => 'Geçerli bir telefon numarası formatı giriniz.',

            'password.required' => 'Şifre zorunludur.',
            'password.string' => 'Şifre karakterlerden oluşmalıdır.',
            'password.min' => 'Şifre minimum 8 karakter içermelidir.',
        ];
    }

}
