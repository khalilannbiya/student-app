@extends('templates.default')

@php
$title= "Edit Data";
@endphp

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('students.update', ['id' => $student->id]) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label" for="name">Nama</label>
                <input type="text" id="name" class="form-control" name="name" placeholder="Input Nama"
                    value="{{ $student->name }}">
            </div>
            <div class="mb-3">
                <label class="form-label" for="address">Alamat</label>
                <input type="text" id="address" class="form-control" name="address" placeholder="Input Alamat"
                    value="{{ $student->address }}">
            </div>
            <div class="mb-3">
                <label class="form-label" for="phone_number">Nomor Telepon</label>
                <input type="text" id="phone_number" class="form-control" name="phone_number"
                    placeholder="Input Nomor Telepon" value="{{ $student->phone_number }}">
            </div>
            <div class="mb-3">
                <label class="form-label" for="class">Kelas</label>
                <input type="text" id="class" class="form-control" name="class" placeholder="Input Kelas"
                    value="{{ $student->class }}">
            </div>
            <button type="submit" class="btn btn-primary w-100">
                Submit
            </button>
        </form>
    </div>
</div>
@endsection