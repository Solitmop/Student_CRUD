<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StatementMarksRequest;
use App\Models\StatementMarks;

// Контроллер для работы с оценками в ведомостях
class StatementMarksViewController extends Controller
{
    public function store(StatementMarksRequest $request)
    {
        try {
                $validated = $request->validated();
                $mark = new StatementMarks($validated);
                $mark->save();

                return redirect()->back()->with('success');
            } catch (\Exception $e) {
                return redirect()->back()->withErrors(['Error: ' . $e->getMessage()])->withInput();
            }
    }

    public function update(StatementMarksRequest $request, $id)
    {
        $validated = $request->validated();
        $mark = StatementMarks::findOrFail($id);
        
        if($mark->update($validated)) {
            return redirect()->back()->with('success');
        }
        
        return back()->with('error');
    }

    public function destroy($id)
    {
        try {
            $mark = StatementMarks::find($id);
            $mark->delete();

            return redirect()->back()->with('success');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['Error: ' . $e->getMessage()])->withInput();
        }
    }
}
