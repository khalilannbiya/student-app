@extends('templates.default')

@push('page-action')
{{-- <a href="{{ route('students.create') }}" class="btn btn-primary">Add Data</a> --}}
<a href="{{ route('students.exportPdf') }}" class="btn btn-danger">
    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-download" width="24" height="24"
        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
        stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
        <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
        <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
        <path d="M12 17v-6"></path>
        <path d="M9.5 14.5l2.5 2.5l2.5 -2.5"></path>
    </svg>
    Export Data PDF
</a>
@endpush
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
                        <th>Photo</th>
                        <th>Address</th>
                        <th>Phone Number</th>
                        <th>Class</th>
                        <th class="w-1">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->name }}</td>
                        <td>
                            <img src="{{ Storage::exists('public/' . $student->photo) ? asset('storage/' . $student->photo) : "
                                data:image/gif;base64,R0lGODlhAQABAIAAAMLCwgAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" }}"
                                width="100px" alt="{{ " Photo $student->name" }}">
                        </td>
                        <td class="text-muted">
                            {{ $student->address }}
                        </td>
                        <td class="text-muted"><a href="tel:{{ $student->phone_number }}" class="text-reset">{{
                                $student->phone_number }}</a></td>
                        <td class="text-muted">
                            {{ $student->studentClass->name }}
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