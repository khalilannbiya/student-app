<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function index()
    {
        return view('students.index', [
            // "students" => Student::get(), // Data terbaru dibawah
            "students" => Student::latest()->get(), // Data terbaru diatas
            "title" => "Students Data",
            "preTitle" => "Students App"
        ]);
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'min:3'],
            'address' => ['required', 'min:10'],
            'phone_number' => ['required', 'numeric'],
            'class' => ['required'],
        ]);

        $student = new Student();

        $student->name = $request->input('name');
        $student->address = $request->input('address');
        $student->phone_number = $request->input('phone_number');
        $student->class = $request->input('class');

        $student->save();

        session()->flash('success', "Data Berhasil Ditambahan");

        return redirect()->route('students.index');
    }

    public function edit(string $id)
    {
        $student = Student::find($id);
        return view('students.edit', [
            "student" => $student
        ]);
    }

    public function update(Request $request, string $id)
    {
        $student = Student::find($id);

        $student->name = $request->input('name');
        $student->address = $request->input('address');
        $student->phone_number = $request->input('phone_number');
        $student->class = $request->input('class');

        $student->save();

        session()->flash('success', "Data Berhasil Diperbarui");

        return redirect()->route('students.index');
    }

    public function destroy(string $id)
    {
        $student = Student::find($id);
        $student->delete();

        session()->flash('success', "Data dengan Id $student->id Berhasil Dihapus");
        return redirect()->route('students.index');
    }
}
