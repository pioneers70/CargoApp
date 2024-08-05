<?php

namespace App\Http\Controllers;

use App\Models\MaterialAsset;

class MainPageController extends Controller
{
    public function index()
    {
        $materialAsset = MaterialAsset::with('operations', 'asset_category');

    }
}
