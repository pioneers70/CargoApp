<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class MaterialAssetFilter extends AbstractFilter
{
    public const NAME = 'name';

    public const ASSET_CATEGORY_ID = 'asset_category_id';

    public const TAGS = 'tags';

    protected function getCallbacks(): array
    {
        return [
            self::NAME => [$this, 'name'],
            self::ASSET_CATEGORY_ID => [$this, 'asset_category_id'],
            self::TAGS => [$this, 'tags'],

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

    public function tags(Builder $builder, $value)
    {
        $builder->whereHas('tags', function ($query) use ($value) {
            $query->whereIn('tag_id', (array) $value);
        });
    }
}
