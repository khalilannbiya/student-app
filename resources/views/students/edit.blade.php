@extends('templates.default')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('students.update', $student->id) }}" method="post" enctype="multipart/form-data">
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
                <label class="form-label" for="student_class_id">Kelas</label>
                <select class="form-control @error('student_class_id')
                is-invalid
            @enderror" name="student_class_id" id="student_class_id">
                    @foreach ($classes as $class)
                    <option value="{{ $class->id }}" @selected($class->id ==
                        $student->student_class_id)>{{ $class->name }}
                    </option>
                    @endforeach
                </select>
                @error('student_class_id')
                <span class="invalid-feedback">{{ $message }}</>
                    @enderror
            </div>

            <div class="card">
                <div class="row row-0">
                    <div class="col-3">
                        <!-- Photo -->
                        <img src="{{ asset('storage/' . $student->photo) }}"
                            class="w-100 h-100 object-cover card-img-start" alt="{{ " Photo $student->name" }}">
                    </div>
                    <div class="col">
                        <div class="card-body">
                            <h3 class="card-title">Before Photo Preview</h3>
                        </div>
                    </div>
                </div>
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