<?php

namespace App\Http\Controllers\Api;

use App\Models\StatementMarks;
use App\Http\Controllers\Controller;
use App\Http\Requests\StatementMarksRequest;

class StatementMarksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = StatementMarks::all();
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StatementMarksRequest $request)
    {
        $validated = $request->validated();
        $statement_mark = new StatementMarks($validated);
        $statement_mark->save();
        $created = StatementMarks::orderByDesc('ID')->first();
        return response()->json($created, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(StatementMarks $statement_mark)
    {
        return response()->json($statement_mark);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StatementMarksRequest $request, StatementMarks $statement_mark)
    {
        $validated = $request->validated();
        $statement_mark->update($validated);
        return response()->json($statement_mark);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StatementMarks $statement_mark)
    {
        $statement_mark->delete();
        return response()->json(null, 204);
    }
}
