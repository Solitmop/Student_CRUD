<?php

namespace App\Http\Controllers\Api;

use App\Models\MarkTypes;
use App\Http\Controllers\Controller;
use App\Http\Requests\MarkTypesRequest;

class MarkTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = MarkTypes::all();
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MarkTypesRequest $request)
    {
        $validated = $request->validated();
        $mark_type = new MarkTypes($validated);
        $mark_type->save();
        $created = MarkTypes::orderByDesc('ID')->first();
        return response()->json($created, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(MarkTypes $mark_type)
    {
        return response()->json($mark_type);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MarkTypesRequest $request, MarkTypes $mark_type)
    {
        $validated = $request->validated();
        $mark_type->update($validated);
        return response()->json($mark_type);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MarkTypes $mark_type)
    {
        $mark_type->delete();
        return response()->json(null, 204);
    }
}
