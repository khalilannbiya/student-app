@extends('templates.default')

@php
$title = "Siswa Dalam Kelas";
$preTitle = "Data Siswa di kelas $class->name";
@endphp

@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="table-responsive">
            <table class="table table-vcenter card-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Photo</th>
                        <th>Address</th>
                        <th>Phone Number</th>
                        <th>Class</th>
                        <th class="w-1">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($class->students as $student)
                    <tr>
                        <td>{{ $student->name }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $student->photo) }}" width="100px" alt="{{ " Photo
                                $student->name" }}">
                        </td>
                        <td class="text-muted">
                            {{ $student->address }}
                        </td>
                        <td class="text-muted"><a href="tel:{{ $student->phone_number }}" class="text-reset">{{
                                $student->phone_number }}</a></td>
                        <td class="text-muted">
                            {{ $class->name }}
                        </td>
                        <td>
                            <a href="{{ route('students.edit', $student->id)  }}"
                                class="btn btn-success btn-sm w-100">Edit</a>
                            <form action="{{ route('students.destroy',  $student->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm w-100" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection