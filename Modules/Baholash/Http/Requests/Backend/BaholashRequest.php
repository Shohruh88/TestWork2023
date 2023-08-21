<?php

namespace Modules\Baholash\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

final class BaholashRequest extends FormRequest
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
    public function rules(): array
    {
        $rules = [
            'backend.rates.store' => [
                'employee_id' => 'required|integer|unique:employee_rates',
                'theme_id' => 'required|integer',
                'k1' => 'required_with:k2,k3,k4|integer',
                'k2' => 'required_with:k1,k3,k4|integer',
                'k3' => 'required_with:k1,k2,k4|integer',
                'k4' => 'required_with:k1,k2,k3|integer',
            ],

            'backend.rates.update' => [
                'employee_id' => ['required','integer', Rule::unique('employee_rates', 'employee_id')->ignore($this->employee_id)],
                'theme_id' => 'required|integer',
                'manager_id' => 'required|integer',
                'k1' => 'required_with:k2,k3,k4|integer',
                'k2' => 'required_with:k1,k3,k4|integer',
                'k3' => 'required_with:k1,k2,k4|integer',
                'k4' => 'required_with:k1,k2,k3|integer',
            ]
        ];

        return $rules[$this->route()->getName()];
    }

    public function attributes()
    {
        return [
            'employee_id' => 'Hodim',
            'theme_id' => 'Mavzu',
            'manager_id' => 'Rahbar',
            'k1' => 'Ko\'rsatkich 1',
            'k2' => 'Ko\'rsatkich 2',
            'k3' => 'Ko\'rsatkich 3',
            'k4' => 'Ko\'rsatkich 4',
        ];
    }
}
