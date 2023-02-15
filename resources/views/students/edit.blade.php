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
                <input type="text" id="name" class="form-control @error('name')
                is-invalid
            @enderror" name="name" placeholder="Input Nama" value="{{ old('name') ?? $student->name }}">
                @error('name')
                <span class="invalid-feedback">{{ $message }}</>
                    @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="address">Alamat</label>
                <input type="text" id="address" class="form-control @error('address')
                is-invalid
            @enderror" name="address" placeholder="Input Alamat" value="{{ old('address') ?? $student->address }}">
                @error('address')
                <span class="invalid-feedback">{{ $message }}</>
                    @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="phone_number">Nomor Telepon</label>
                <input type="text" id="phone_number" class="form-control @error('phone_number')
                is-invalid
            @enderror" name="phone_number" placeholder="Input Nomor Telepon"
                    value="{{ old('phone_number') ?? $student->phone_number }}">
                @error('phone_number')
                <span class="invalid-feedback">{{ $message }}</>
                    @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="class">Kelas</label>
                <input type="text" id="class" class="form-control @error('class')
                is-invalid
            @enderror" name="class" placeholder="Input Kelas" value="{{ old('class') ?? $student->class }}">
                @error('class')
                <span class="invalid-feedback">{{ $message }}</>
                    @enderror
            </div>
            <button type="submit" class="btn btn-primary w-100">
                Submit
            </button>
        </form>
    </div>
</div>
@endsection