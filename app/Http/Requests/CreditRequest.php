<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreditRequest extends FormRequest {
    public function rules(): array {
        return [
            'idClient' => 'required|integer',
            'dateBirthday' => 'required|date',
            'phone' => 'nullable|regex:/^\+380\d{9}$/',
            'mail' => 'nullable|email',
            'address' => 'nullable|string',
            'monthSalary' => 'nullable|numeric|min:0',
            'currSalary' => 'nullable|string|size:3',
            'requestLimit' => 'required|numeric'
        ];
    }
}
