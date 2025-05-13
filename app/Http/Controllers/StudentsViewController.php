<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentsRequest;
use App\Models\Students;
use App\Models\Groups;
use App\Http\Controllers\Controller;

// Контроллер для views/students.blade.php и views/students/*.blade.php
class StudentsViewController extends Controller
{
    // Режим "Студенты"
    public function index()
    {
        $students = Students::all()->toArray();
        $groups = Groups::all()->toArray();

        foreach ($groups as $group) {
            $groupMap[$group['ID']] = $group['GROUP_NAME'];
        }

        return view('students', ['students' => $students, 'groupMap' => $groupMap]);
    }

    public function store(StudentsRequest $request)
    {
        try {
            $validated = $request->validated();
            $student = new Students($validated);
            $student->save();

            return redirect(url('/students'))->with('success');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['Error: ' . $e->getMessage()])->withInput();
        }
    }

    public function create()
    {
        $groups = Groups::all()->toArray();
        return view('students.create', ['groups' => $groups]);
    }

    // Режим "Личная карточка"
    public function show($id)
    {
        $student = Students::find($id)->toArray();
        $groups = Groups::all()->toArray();

        $groupName = GROUPS::where('ID', $student['GROUP_ID'])->first()->toArray()['GROUP_NAME'] ?? '';

        return view('students.card', [
            'student' => $student,
            'groupName' => $groupName,
            'groups' => $groups,
        ]);
    }

    public function update(StudentsRequest $request, $id)
    {
        $validated = $request->validated();
        $student = Students::findOrFail($id);
        
        if($student->update($validated)) {
            return redirect()->back()->with('success');
        }
        
        return back()->with('error');
    }

    public function destroy($id)
    {
        try {
            $student = Students::find($id);
            $student->delete();

            return redirect(url('/students'))->with('success');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['Error: ' . $e->getMessage()])->withInput();
        }
    }
}
?>