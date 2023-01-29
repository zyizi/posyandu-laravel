@extends('layouts.app-master')

@section('content')
@auth
<form>
    <div class="form-group">
        <label for="nama_bayi">Nama Bayi:</label>
        <select class="form-control" id="nama_bayi" name="nama_bayi" onchange="updateNamaIbu()">
    @foreach($nama_bayi as $bayi)
                <option value="{{ $bayi->nama_bayi }}">{{ $bayi->nama_bayi }}</option>
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
        var nama_bayi = $('#nama_bayi').val();
        $.get('/get-nama-ibu/' + nama_bayi, function(data) {
            $('#nama_ibu').html(data);
        });
    }
</script>

