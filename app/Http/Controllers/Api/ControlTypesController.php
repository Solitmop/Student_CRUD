<?php

namespace App\Http\Controllers\Api;

use App\Models\ControlTypes;
use App\Http\Controllers\Controller;
use App\Http\Requests\ControlTypesRequest;

class ControlTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = ControlTypes::all();
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ControlTypesRequest $request)
    {
        $validated = $request->validated();
        $control_type = new ControlTypes($validated);
        $control_type->save();
        $created = ControlTypes::orderByDesc('ID')->first();
        return response()->json($created, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(ControlTypes $control_type)
    {   
        return response()->json($control_type);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ControlTypesRequest $request, ControlTypes $control_type)
    {
        $validated = $request->validated();
        $control_type->update($validated);
        return response()->json($control_type);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ControlTypes $control_type)
    {
        $control_type->delete();
        return response()->json(null, 204);
    }
}
