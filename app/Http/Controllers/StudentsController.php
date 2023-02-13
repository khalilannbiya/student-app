<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function index()
    {
        return view('students.index', [
            "students" => Student::get()
        ]);
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $student = new Student();

        $student->name = $request->input('name');
        $student->address = $request->input('address');
        $student->phone_number = $request->input('phone_number');
        $student->class = $request->input('class');

        $student->save();
        return redirect('/students');
    }
}
