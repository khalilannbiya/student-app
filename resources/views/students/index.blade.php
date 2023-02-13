@extends('templates.default')

@section('content')
<div class="col-lg-8">
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
                            <a href="#">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection