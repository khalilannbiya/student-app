@extends('templates.default')

@push('page-action')
<a href="{{ route('student-classes.create') }}" class="btn btn-primary">
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
                        <th>Slug</th>
                        <th class="w-1">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($classes as $class)
                    <tr>
                        <td>{{ $class->name }}</td>
                        <td class="text-muted">
                            {{ $class->slug }}
                        </td>
                        <td>
                            <a href="{{ route('student-classes.edit', $class->id)  }}"
                                class="btn btn-success btn-sm w-100">Edit</a>
                            <form action="{{ route('student-classes.destroy',  $class->id) }}" method="post">
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