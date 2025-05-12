<?php

namespace App\Http\Controllers\Api;

use App\Models\Statements;
use App\Http\Controllers\Controller;
use App\Http\Requests\StatementsRequest;

class StatementsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Statements::all();
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StatementsRequest $request)
    {
        $validated = $request->validated();
        $statement = new Statements($validated);
        $statement->save();
        $created = Statements::orderByDesc('ID')->first();
        return response()->json($created, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Statements $statement)
    {
        return response()->json($statement);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StatementsRequest $request, Statements $statement)
    {
        $validated = $request->validated();
        $statement->update($validated);
        return response()->json($statement);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Statements $statement)
    {
        $statement->delete();
        return response()->json(null, 204);
    }
}
