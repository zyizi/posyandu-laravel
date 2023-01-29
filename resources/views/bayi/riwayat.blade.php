@extends('layouts.app-master')

@section('content')
@auth
<form method="post" action="{{ route('showHistory') }}">
    @csrf
    <input type="hidden" name="_method" value="get">
    <div class="form-group">
        <label for="nama_bayi">Nama Bayi:</label>
        <select class="form-control" id="nama_bayi" name="nama_bayi">
            @foreach($bayis as $bayi)
            <option value="{{$bayi->nama_bayi}}">{{$bayi->nama_bayi}}</option>
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
        @foreach($data as $bayi)
        @foreach($bayi->pengukuran as $pengukuran)
        <tr>
            <td>{{ $pengukuran->nama_bayi }}</td>
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
            var nama_bayi = $('#nama_bayi').val();
            $.get('/get-nama-ibu/' + nama_bayi, function(data) {
                $('#nama_ibu').html(data.options);
            });
        }
        $('#nama_bayi').change(updateNamaIbu);
    </script>
    @endauth
    @endsection
