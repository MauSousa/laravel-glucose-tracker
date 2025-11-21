<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Enums\Condition;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBitacoraRequest extends FormRequest
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
            'day' => ['nullable', Rule::date()],
            'time_of_test' => ['nullable', Rule::date()->format('H:i')],
            'glucose' => ['nullable', 'numeric', 'min:0'],
            'condition' => ['nullable', Rule::enum(Condition::class)],
            'food' => ['nullable', 'string', 'min:0', 'max:255'],
        ];
    }
}
