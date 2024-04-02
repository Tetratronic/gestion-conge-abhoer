<?php

namespace App\Http\Requests;

use App\Rules\ArabicText;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\ValidationRule;


class VacationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function messages()
{
    return [
        'fullname_ar.exists' => 'Cet employé n\'éxiste pas.',
        'end_date.required_if' => 'Ce champs est requis si la durée est nulle',
        'duration.required_if' => 'Ce champs est requis si la date fin est nulle',
        'duration.lte' => 'La durée ne doit pas dépasser 44 jours.'
    ];
}

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {

        return [
            'fullname_ar' => [
                'required', Rule::exists('employees', 'idnumber'), new ArabicText()
            ],
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date|required_if:duration,null',
            'duration' => 'nullable|numeric|min:1|lte:44|required_if:end_date,null|',
        ];
    }
}
