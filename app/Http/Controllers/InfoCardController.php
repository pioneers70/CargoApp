<?php

namespace App\Http\Controllers;

use App\Http\Requests\InfoCard\StoreInfoCardRequest;
use App\Http\Requests\InfoCard\UpdateInfoCardRequest;
use App\Models\InfoCard;

class InfoCardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInfoCardRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(InfoCard $infoCard)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InfoCard $infoCard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInfoCardRequest $request, InfoCard $infoCard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InfoCard $infoCard)
    {
        //
    }
}
