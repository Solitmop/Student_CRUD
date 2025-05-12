<?php

namespace App\Http\Controllers\Api;

use App\Models\Teachers;
use App\Http\Controllers\Controller;
use App\Http\Requests\TeachersRequest;

class TeachersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Teachers::all();
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeachersRequest $request)
    {
        $validated = $request->validated();
        $teacher = new Teachers($validated);
        $teacher->save();
        $created = Teachers::orderByDesc('ID')->first();
        return response()->json($created, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Teachers $teacher)
    {
        return response()->json($teacher);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TeachersRequest $request, Teachers $teacher)
    {
        $validated = $request->validated();
        $teacher->update($validated);
        return response()->json($teacher);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teachers $teacher)
    {
        $teacher->delete();
        return response()->json(null, 204);
    }
}
