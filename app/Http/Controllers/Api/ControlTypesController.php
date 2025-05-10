<?php

namespace App\Http\Controllers\Api;

use App\Models\ControlTypes;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ControlTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = ControlTypes::all();
        return $data;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ControlTypes $control_types)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ControlTypes $control_types)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ControlTypes $control_types)
    {
        //
    }
}
