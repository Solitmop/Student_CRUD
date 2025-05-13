<?php

namespace App\Http\Controllers\Api;

use App\Models\Groups;
use App\Http\Controllers\Controller;
use App\Http\Requests\GroupsRequest;
class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Groups::all();
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GroupsRequest $request)
    {
        $validated = $request->validated();
        $group = new Groups($validated);
        $group->save();
        $created = Groups::orderByDesc('ID')->first();
        return response()->json($created, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Groups $group)
    {
        return response()->json($group);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GroupsRequest $request, Groups $group)
    {
        $validated = $request->validated();
        $group->update($validated);
        return response()->json($group);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Groups $group)
    {
        $group->delete();
        return response()->json(null, 204);
    }
}
