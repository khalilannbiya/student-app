@extends('templates.default')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('student-classes.update', $class->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class=" mb-3">
                <label class="form-label" for="name">Nama</label>
                <input type="text" id="name" class="form-control @error('name')
                is-invalid
            @enderror" name="name" placeholder="Input Nama" value="{{ old('name') ?? $class->name }}">
                @error('name')
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