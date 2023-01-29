@extends('layouts.app-master')

@section('content')
@auth
<form action="{{route('pengukuran.store')}}" method="post">
    @csrf
    <div class="form-group">
        <label for="nama_balita">Nama Balita:</label>
        <select class="form-control" id="nama_balita" name="nama_balita" onchange="updateNamaIbu()">
        @foreach($balitas as $d)
            <option value="{{$d->nama_balita}}">{{$d->nama_balita}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="nama_ibu">Nama Ibu:</label>
        <select class="form-control" id="nama_ibu" name="nama_ibu">
        </select>
    </div>
    <div class="form-group">
        <label for="tanggal_pengukuran">Tanggal Pengukuran:</label>
        <input type="date" class="form-control" id="tanggal_pengukuran" name="tanggal_pengukuran">
    </div>
    <div class="form-group">
        <label for="berat">Berat:</label>
        <input type="text" class="form-control" id="berat" name="berat" readonly>
    </div>
    <div class="form-group">
        <label for="tinggi">Tinggi:</label>
        <input type="text" class="form-control" id="tinggi" name="tinggi" readonly>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<script>
    function updateNamaIbu() {
        var nama_balita = $('#nama_balita').val();
        $.get('/get-nama-ibu/' + nama_balita, function(data) {
            $('#nama_ibu').html(data.options);
        });
    }
    $('#nama_balita').change(updateNamaIbu);
    $(document).ready(function(){
        setInterval(function(){
            $.ajax({
                url: '/getTinggi',
                type: 'GET',
                success: function(data) {
                    $('#tinggi').val(parseFloat(data.tinggi.tinggi));
                    $('#berat').val(parseFloat(data.tinggi.tinggi));
                }
            });
        }, 500);
    });
</script>
@endauth
@endsection
