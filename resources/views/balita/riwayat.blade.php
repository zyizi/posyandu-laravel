@extends('layouts.app-master')

@section('content')
@auth
<form method="post" action="{{ route('showHistory') }}">
    @csrf
    <input type="hidden" name="_method" value="get">
    <div class="form-group">
        <label for="nama_balita">Nama Balita:</label>
        <select class="form-control" id="nama_balita" name="nama_balita">
            @foreach($balitas as $balita)
            <option value="{{$balita->nama_balita}}">{{$balita->nama_balita}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="nama_ibu">Nama Ibu:</label>
        <select class="form-control" id="nama_ibu" name="nama_ibu">
        </select>
    </div>
    <div class="form-group">
        <input type="submit" value="Submit" class="btn btn-primary">
    </div>
    <table class="table">
        <thead>
        <tr>
            <th>Nama Balita</th>
            <th>Berat</th>
            <th>Tinggi</th>
            <th>Tanggal</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $balita)
        @foreach($balita->pengukuran as $pengukuran)
        <tr>
            <td>{{ $pengukuran->nama_balita }}</td>
            <td>{{ $pengukuran->berat }}</td>
            <td>{{ $pengukuran->tinggi }}</td>
            <td>{{ $pengukuran->tanggal_pengukuran }}</td>
        </tr>
        @endforeach
        @endforeach
        </tbody>
    </table>
</form>
    <script>
        function updateNamaIbu() {
            var nama_balita = $('#nama_balita').val();
            $.get('/get-nama-ibu/' + nama_balita, function(data) {
                $('#nama_ibu').html(data.options);
            });
        }
        $('#nama_balita').change(updateNamaIbu);
    </script>
    @endauth
    @endsection
