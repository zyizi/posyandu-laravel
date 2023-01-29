@extends('layouts.app-master')

@section('content')
@auth
<form action="/balita" method="post">
    @csrf
    <div class="form-group">
        <label for="nama_balita">Nama Balita:</label>
        <input type="text" class="form-control" id="nama_balita" name="nama_balita">
    </div>
    <div class="form-group">
        <label for="nama_ibu">Nama Ibu:</label>
        <input type="text" class="form-control" id="nama_ibu" name="nama_ibu">
    </div>
    <div class="form-group">
        <label for="tanggal_lahir">Tanggal Lahir:</label>
        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
    </div>
    <div class="form-group">
        <label for="jenis_kelamin">Jenis Kelamin:</label>
        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
            <option value="L">Laki-Laki</option>
            <option value="P">Perempuan</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endauth
@endsection
