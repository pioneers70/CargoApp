<?php

namespace App\Http\Requests\AssetCategory;

use App\Rules\NonOnlyNumeric;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreAssetCategoryRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'full_name' => ['required', 'string', new NonOnlyNumeric],
            'short_name' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'full_name.required' => 'Полное название обязательно к заполнению',
            'full_name.string' => 'Полное название должно быть текстовым',
            'short_name.string' => 'Сокращенное название должно быть текстовым',
        ];
    }
}
