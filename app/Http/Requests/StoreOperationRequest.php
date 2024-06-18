<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOperationRequest extends FormRequest
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
            'material_asset_id' => 'required|array',
            'material_asset_id.*' => 'required|exists:material_assets,id',
            'quantity' => 'required|array',
            'quantity.*' => 'required|integer|min:1',
            'to_warehouse_id' => 'required|exists:warehouses,id',
            'reason' => 'nullable|string',
        ];
    }
}
