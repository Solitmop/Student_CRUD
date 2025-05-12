<?php

namespace App\Http\Controllers\Api;

use App\Models\Students;
use App\Http\Controllers\Controller;
use App\Http\Requests\StudentsRequest;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Students::all();
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentsRequest $request)
    {
        $validated = $request->validated();
        $student = new Students($validated);
        $student->save();
        $created = Students::orderByDesc('ID')->first();
        return response()->json($created, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Students $student)
    {
        return response()->json($student);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StudentsRequest $request, Students $student)
    {
        $validated = $request->validated();
        $student->update($validated);
        return response()->json($student);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Students $student)
    {
        $student->delete();
        return response()->json(null, 204);
    }
}
