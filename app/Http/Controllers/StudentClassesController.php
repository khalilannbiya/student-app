<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class StudentClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('classes.index', [
            'classes' => StudentClass::get(),
            'title' => "Classes Data"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('classes.create', [
            'title' => "Input Data Class"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
        ]);

        $slug = Str::of($request->input('name'))->slug('-');

        $class = new StudentClass();

        $class->name = $request->input('name');
        $class->slug = $slug;

        $class->save();

        session()->flash('success', 'Data Berehasil Ditambahkan');
        return redirect()->route('student-classes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return view('classes.show', [
            'class' => StudentClass::where('slug', $slug)->first(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $class = StudentClass::find($id);
        return view('classes.edit', [
            'class' => $class,
            "title" => "Edit Data"
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required'],
        ]);

        $slug = Str::of($request->input('name'))->slug('-');

        $class = StudentClass::find($id);
        $class->name = $request->input('name');
        $class->slug = $slug;

        $class->save();

        session()->flash('success', "Data Berhasil Diperbarui");

        return redirect()->route('student-classes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $class = StudentClass::find($id);
        $class->delete();

        session()->flash('success', "Data dengan Id $class->id Berhasil Dihapus");

        return redirect()->route('student-classes.index');
    }
}
