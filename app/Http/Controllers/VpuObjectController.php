<?php

namespace App\Http\Controllers;

use App\Models\System;
use App\Models\VpuObject;
use App\Http\Requests\StoreVpuObjectRequest;
use App\Http\Requests\UpdateVpuObjectRequest;

class VpuObjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vpuObjects = VpuObject::with('systems')->get();
        return view('vpuObject.index',compact('vpuObjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $systems = System::all();
        return view('vpuObject.create', compact('systems'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVpuObjectRequest $request)
    {
        $data = $request->validated();
        $systems = $data['systems'];
        unset($data['systems']);
        $vpuObject = VpuObject::create($data);
        $vpuObject->systems()->attach($systems);
        return redirect()->back()->with('status_add', 'Успешно добавлено');
    }

    /**
     * Display the specified resource.
     */
    public function show(VpuObject $vpuObject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VpuObject $vpuObject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVpuObjectRequest $request, VpuObject $vpuObject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VpuObject $vpuObject)
    {
        //
    }
}
