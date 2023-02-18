@extends('templates.default')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('students.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="name">Nama</label>
                <input type="text" id="name" class="form-control @error('name')
                    is-invalid
                @enderror" name="name" placeholder="Input Nama" value="{{ old('name') }}">
                @error('name')
                <span class="invalid-feedback">{{ $message }}</>
                    @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="address">Alamat</label>
                <input type="text" id="address" class="form-control @error('address')
                    is-invalid
                @enderror" name="address" placeholder="Input Alamat" value="{{ old('address') }}">
                @error('address')
                <span class="invalid-feedback">{{ $message }}</>
                    @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="phone_number">Nomor Telepon</label>
                <input type="text" id="phone_number" class="form-control @error('phone_number')
                is-invalid
            @enderror" name="phone_number" placeholder="Input Nomor Telepon" value="{{ old('phone_number') }}">
                @error('phone_number')
                <span class="invalid-feedback">{{ $message }}</>
                    @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="student_class_id">Kelas</label>
                <select class="form-control @error('student_class_id')
                is-invalid
            @enderror" name="student_class_id" id="student_class_id">
                    <option value="">Pilih Kelas</option>
                    @foreach ($classes as $class)
                    <option value="{{ $class->id }}" @selected($class->id == old('student_class_id'))>{{ $class->name }}
                    </option>
                    @endforeach
                </select>
                @error('student_class_id')
                <span class="invalid-feedback">{{ $message }}</>
                    @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="photo">Foto</label>
                <input type="file" id="photo" class="form-control @error('photo')
                is-invalid
            @enderror" name="photo" placeholder="Input Kelas" value="{{ old('photo') }}">
                @error('photo')
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