<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Enums\Condition;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreBitacoraRequest extends FormRequest
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
            'day' => ['required', Rule::date()->format('d-m-Y')],
            'time_of_test' => ['required', Rule::date()->format('H:i:s')],
            'glucose' => ['required', 'integer:strict', 'min:0'],
            'condition' => ['required', Rule::enum(Condition::class)],
            'food' => ['required', 'string', 'min:0', 'max:255'],
        ];
    }
}
