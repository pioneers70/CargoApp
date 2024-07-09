<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class MaterialAssetFilter extends AbstractFilter
{
    public const NAME = 'name';
    public const ASSET_CATEGORY_ID = 'asset_category_id';


    protected function getCallbacks(): array
    {
        return [
            self::NAME => [$this, 'name'],
            self::ASSET_CATEGORY_ID => [$this, 'asset_category_id'],

        ];
    }

    public function name(Builder $builder, $value)
    {
        $builder->where('name', 'like', "%{$value}%");
    }

    public function asset_category_id(Builder $builder, $value)
    {
        $builder->where('asset_category_id', $value);
    }

}
