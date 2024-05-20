<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApartmentApplicationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|regex:/^\+?[0-9]{10,15}$/',
            'complex' => 'required|exists:complexes,id',
            'apartment_type' => 'required|string|max:255',
            'area' => 'required|numeric|min:1',
            'budget' => 'required|numeric|min:1',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Поле ім\'я є обов\'язковим.',
            'email.required' => 'Поле електронна пошта є обов\'язковим.',
            'phone.required' => 'Поле номер телефону є обов\'язковим.',
            'phone.regex' => 'Номер телефону повинен бути у форматі +380XXXXXXXXX або 0XXXXXXXXX.',
            'complex.required' => 'Потрібно вибрати комплекс.',
            'apartment_type.required' => 'Поле тип квартири є обов\'язковим.',
            'area.required' => 'Поле площа квартири є обов\'язковим.',
            'budget.required' => 'Поле бюджет є обов\'язковим.',
        ];
    }
}
