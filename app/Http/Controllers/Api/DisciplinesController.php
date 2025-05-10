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
        return $data;
    }

    public function store(DisciplinesRequest $request)
    {
        $validated = $request->validated();
        $discipline = Disciplines::create($validated);
        return response()->json($discipline, 201);
    }

    public function show(Disciplines $discipline)
    {
        return $discipline = Disciplines::findOrFail($discipline); //response()->json($discipline);
    }

    public function update(DisciplinesRequest $request, $id) 
    {
        $validated = $request->validated();
        $discipline = Disciplines::findOrFail($id);
        $discipline->fill($discipline->except(['ID']));
        $discipline->save();
        return response()->json($discipline);
    }

    public function destroy(Disciplines $discipline, $id) 
    {
        $discipline = Disciplines::findOrFail($id);
        if($discipline->delete()) return response(null, 204);
    }
}