@extends('layouts.app-master')

@section('content')
<form action="{{route('timbangan.store')}}" method="post">
    @csrf
    <div class="form-group">
        <label for="berat">Berat:</label>
        <input type="number" class="form-control" id="berat" name="berat" readonly>
    </div>
    <div class="form-group">
        <label for="tinggi">Tinggi:</label>
        <input type="number" class="form-control" id="tinggi" name="tinggi" readonly>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<script>
    $(document).ready(function(){
        setInterval(function(){
            $.ajax({
                url: '/getTinggi',
                type: 'GET',
                success: function(data) {
                    $('#tinggi').val(parseFloat(data.tinggi.tinggi));
                }
            });
        }, 500);
    });
</script>
@endsection

