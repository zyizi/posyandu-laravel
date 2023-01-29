@extends('layouts.app-master')

@section('content')
@auth
<form>
    <div class="form-group">
        <label for="nama_balita">Nama Balita:</label>
        <select class="form-control" id="nama_balita" name="nama_balita" onchange="updateNamaIbu()">
    @foreach($nama_balita as $balita)
                <option value="{{ $balita->nama_balita }}">{{ $balita->nama_balita }}</option>
@endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="nama_ibu">Nama Ibu:</label>
        <select class="form-control" id="nama_ibu" name="nama_ibu">
        </select>
    </div>
    <div class="form-group">
        <label for="berat">Berat:</label>
        <input type="number" class="form-control" id="berat" name="berat">
    </div>
    <div class="form-group">
        <label for="tinggi">Tinggi:</label>
        <input type="number" class="form-control" id="tinggi" name="tinggi">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endauth
@endsection

<script>
    function updateNamaIbu() {
        var nama_balita = $('#nama_balita').val();
        $.get('/get-nama-ibu/' + nama_balita, function(data) {
            $('#nama_ibu').html(data);
        });
    }
</script>

