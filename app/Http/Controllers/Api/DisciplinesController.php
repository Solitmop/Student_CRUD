<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DisciplinesRequest; 
use App\Models\Disciplines;

class DisciplinesController extends Controller
{
    public function index()
    {   
        $data = Disciplines::all();
        return response()->json($data);
    }

    public function store(DisciplinesRequest $request)
    {
        $validated = $request->validated();
        $discipline = new Disciplines($validated);
        $discipline->save();
        $created = Disciplines::orderByDesc('ID')->first();
        return response()->json($created, 201);
    }

    public function show(Disciplines $discipline)
    {
        return response()->json($discipline);
    }

    public function update(DisciplinesRequest $request, Disciplines $discipline) 
    {
        $validated = $request->validated();
        $discipline->update($validated);
        return response()->json($discipline);
    }

    public function destroy(Disciplines $discipline) 
    {
        $discipline->delete();
        return response()->json(null, 204);
    }
}