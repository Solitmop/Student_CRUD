<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StatementsRequest;
use App\Models\Statements;
use App\Models\Teachers;
use App\Models\Disciplines;
use App\Models\Students;
use App\Models\StatementMarks;
use App\Models\MarkTypes;

// Контроллер для views/statements.blade.php и views/statements/marks.blade.php
class StatementsViewController extends Controller
{
    // Режим "Ведомости"
    public function index()
    {
        $statements = Statements::all()->toArray();
        $disciplines = Disciplines::all()->toArray();
        $teachers = Teachers::all()->toArray();
        foreach ($disciplines as $discipline) {
            $disciplineMap[$discipline['ID']] = $discipline['DISC_NAME'];
        }
        foreach ($teachers as $teacher) {
            $teacherMap[$teacher['ID']] = $teacher['FIO'];
        }

        return view('statements', [
            'statements'     => $statements,
            'disciplines'    => $disciplines,
            'disciplineMap'  => $disciplineMap,
            'teachers'       => $teachers,
            'teacherMap'     => $teacherMap
        ]);
    }

    public function store(StatementsRequest $request)
    {
        try {
                $validated = $request->validated();
                $statement = new Statements($validated);
                $statement->save();

                return redirect(url('/statements'))->with('success');
            } catch (\Exception $e) {
                return redirect()->back()->withErrors(['Error: ' . $e->getMessage()])->withInput();
            }
    }

    // Режим "Оценки в ведомости"
    public function show($id)
    {
        $statement = Statements::find($id)->toArray();
        $students = Students::all()->toArray();
        $marks = StatementMarks::where('STATEMENT_ID', $id)->get()->toArray();
        $disciplines = Disciplines::all()->toArray();
        $teachers = Teachers::all()->toArray();

        $discipline = Disciplines::find($statement['DISCIPLINE_ID'])->first()->toArray();
        $teacher = Teachers::find($statement['TEACHER_ID'])->first()->toArray();
        
        foreach ($students as $student) {
            $studentMap[$student['ID']] = $student['FIO'];
        }

        foreach ($marks as $mark) {
            $studentsWithMarks[] = $mark['STUD_ID'];
        }
        foreach ($students as $student) {
            if (!in_array($student['ID'], $studentsWithMarks)) {
                $availableStudents[] = $student;
            }
        }

        $mark_types = MarkTypes::all()->toArray();

        return view('statements.marks', [
            'statement' => $statement,
            'students' => $studentMap,
            'availableStudents' => $availableStudents,
            'marks' => $marks,
            'markTypes' => $mark_types,
            'discipline' => $discipline['DISC_NAME'],
            'teacher' => $teacher['FIO']
        ]);
    }

    public function destroy($id)
    {
        try {
            $statement = Statements::find($id);
            $statement->delete();

            return redirect()->back()->with('success');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['Error: ' . $e->getMessage()])->withInput();
        }
    }
}
