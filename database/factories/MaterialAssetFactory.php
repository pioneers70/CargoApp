<?php

namespace Database\Factories;

use App\Models\AssetCategory;
use App\Models\MaterialAsset;
use App\Models\MeasureUnit;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class MaterialAssetFactory extends Factory
{
    protected $model = MaterialAsset::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'asset_category_id' => AssetCategory::factory(),
            'measure_unit_id' => MeasureUnit::factory(),
        ];
    }
}
