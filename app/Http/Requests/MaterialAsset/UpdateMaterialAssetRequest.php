<?php

namespace App\Http\Requests\MaterialAsset;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMaterialAssetRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'asset_category_id' => 'required|integer|exists:asset_categories,id',
            'measure_unit_id' => 'required|integer|exists:measure_units,id',
            'tags' => 'nullable|array',
            'tags.*' => 'integer|exists:tags,id',
            'description' => 'nullable|string',
            'urlimg' => 'nullable|file|mimes:jpg,jpeg,png,bmp,gif,svg,webp',
        ];
    }
}
