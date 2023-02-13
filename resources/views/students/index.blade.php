@extends('templates.default')

@php
$title = "Students Data";
$preTitle = "Students App";
@endphp

@push('page-action')
{{-- <a href="{{ route('students.create') }}" class="btn btn-primary">Add Data</a> --}}
<a href="{{ route('students.create') }}" class="btn btn-primary">
    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
        stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
        <path d="M12 5l0 14"></path>
        <path d="M5 12l14 0"></path>
    </svg>
    Add Data
</a>
@endpush

@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="table-responsive">
            <table class="table table-vcenter card-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Phone Number</th>
                        <th>Class</th>
                        <th class="w-1"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->name }}</td>
                        <td class="text-muted">
                            {{ $student->address }}
                        </td>
                        <td class="text-muted"><a href="tel:{{ $student->phone_number }}" class="text-reset">{{
                                $student->phone_number }}</a></td>
                        <td class="text-muted">
                            {{ $student->class }}
                        </td>
                        <td>
                            <a href="{{ route('students.edit', ['id' => $student->id])  }}">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection