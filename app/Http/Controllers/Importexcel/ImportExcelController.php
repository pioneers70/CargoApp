<?php

namespace App\Http\Controllers\Importexcel;

use App\Http\Controllers\Controller;
use App\Imports\MaterialAssetImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportExcelController extends Controller
{
    public function index()
    {
        return view('importexcel.import-add');
    }

    public function importexcel(Request $request)
    {
        $request->validate([
            'import_file' => [
                'required',
                'file',
            ],
        ]);
        Excel::import(new MaterialAssetImport, $request->file('import_file'));

        return redirect()->back()->with('status', 'Успешно импортировано');

    }
}
