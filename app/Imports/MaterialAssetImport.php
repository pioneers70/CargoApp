<?php

namespace App\Imports;

use App\Models\Item;
use App\Models\MaterialAsset;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class MaterialAssetImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $MaterialAsset = MaterialAsset::where('name', $row['name'])->first();
            if ($MaterialAsset) {
                $MaterialAsset->update([
                    'asset_category_id' => $row['asset_category_id'],
                    'measure_unit_id' => $row['measure_unit_id'],
                ]);
            } else {
                MaterialAsset::create([
                    'name' => $row['name'],
                    'asset_category_id' => $row['asset_category_id'],
                    'measure_unit_id' => $row['measure_unit_id'],
                ]);
            }
        }
    }

}
