<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMaterialAssetRequest extends FormRequest
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
        'name' => 'required|string',
        'asset_category_id' => 'required|exists:asset_categories,id',
        'measure_unit_id' => 'required|exists:measure_units,id',
        'tags' => 'sometimes|array',
        'tags.*' => 'exists:tags,id',
        'description' => 'nullable|string',
        'urlimg' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];

    }
}
