<?php

namespace App\Http\Requests\Operation;

use Illuminate\Foundation\Http\FormRequest;

class StoreWriteoffRequest extends FormRequest
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
            'from_warehouse_id' => 'required|exists:warehouses,id',
            'items' => 'required|array',
            'items.*.material_asset_id' => 'required|exists:material_assets,id',
            'items.*.quantity' => 'required|numeric|min:1',
            'vpu_object_id' => 'required|exists:vpu_objects,id',
            'reason' => 'required|string',
        ];
    }
}
