<?php

namespace App\Http\Requests\Draft;

use Illuminate\Foundation\Http\FormRequest;

class EditDraftRequest extends FormRequest
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
            'id' => ['required', 'numeric', 'min:1'],
            'hero_name' => ['nullable', 'string'],
            'lvl' => ['nullable', 'numeric', 'min:1', 'max:20'],
            'exp' => ['nullable', 'numeric', 'min:0', 'max:355000'],
            'klass' => ['nullable', 'string'],
            'sub_klass' => ['nullable', 'string'],
            'race' => ['nullable', 'string'],
            'sub_race' => ['nullable', 'string'],
            'background' => ['nullable', 'string'],
        ];
    }
}
