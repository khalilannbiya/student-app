<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\StudentClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        return view('students.create', [
            "classes" => StudentClass::get(),
            "title" => "Add Data"
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'min:3'],
            'address' => ['required', 'min:10'],
            'phone_number' => ['required', 'numeric'],
            'student_class_id' => ['required'],
            'photo' => ['image'],
        ]);

        $photo = "photos/default.jpg";

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo')->storePublicly("photos", "public");
        }


        $student = new Student();

        $student->name = $request->input('name');
        $student->address = $request->input('address');
        $student->phone_number = $request->input('phone_number');
        $student->student_class_id = $request->input('student_class_id');
        $student->photo = $photo;

        $student->save();

        session()->flash('success', "Data Berhasil Ditambahan");

        return redirect()->route('students.index');
    }

    public function edit(string $id)
    {
        $student = Student::find($id);
        return view('students.edit', [
            "student" => $student,
            "classes" => StudentClass::get(),
            "title" => "Edit Data"
        ]);
    }

    public function update(Request $request, string $id)
    {

        $request->validate([
            'name' => ['required', 'min:3'],
            'address' => ['required', 'min:10'],
            'phone_number' => ['required', 'numeric'],
            'student_class_id' => ['required'],
            'photo' => ['image'],
        ]);

        $student = Student::find($id);

        $photo = $student->photo;
        if ($request->hasFile('photo')) {
            /**
             * Temukan di storage apakah ada file image yang sesuai dengan data image di database,
             * namun jika data di database adalah photos/default.jpg maka jangan lakukan perintah if dibawah
             * */
            if (Storage::exists($student->photo) && $student->photo != 'photos/default.jpg') {
                /**
                 * Jika ada maka hapus file image dari storage. Tujuannya adalah agar menghapus data duplikat.
                 * Maka jika update image baru, file image yang lama akan dihapus lalu di gantikan dengan yang baru
                 */
                Storage::delete($student->photo);
            }
            // lalu buat/upload file image yang baru
            $photo = $request->file('photo')->storePublicly("photos", "public");
        }

        $student->name = $request->input('name');
        $student->address = $request->input('address');
        $student->phone_number = $request->input('phone_number');
        $student->student_class_id = $request->input('student_class_id');
        $student->photo = $photo;

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
