@extends('templates.default')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="/students" method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="name">Nama</label>
                <input type="text" id="name" class="form-control" name="name" placeholder="Input Nama">
            </div>
            <div class="mb-3">
                <label class="form-label" for="address">Alamat</label>
                <input type="text" id="address" class="form-control" name="address" placeholder="Input Alamat">
            </div>
            <div class="mb-3">
                <label class="form-label" for="phone_number">Nomor Telepon</label>
                <input type="text" id="phone_number" class="form-control" name="phone_number"
                    placeholder="Input Nomor Telepon">
            </div>
            <div class="mb-3">
                <label class="form-label" for="class">Kelas</label>
                <input type="text" id="class" class="form-control" name="class" placeholder="Input Kelas">
            </div>
            <button type="submit" class="btn btn-primary w-100">
                Submit
            </button>
        </form>
    </div>
</div>
@endsection