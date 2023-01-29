<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.87.0">
    <title>Posyandu Prototype</title>

    <!-- Bootstrap core CSS -->
    <link href="{!! url('assets/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="{!! url('assets/css/app.css') !!}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function updateNamaIbu() {
            var nama_bayi = $('#nama_bayi').val();
            $.get('/get-nama-ibu/' + nama_bayi, function(data) {
                $('#nama_ibu').val(data);
            });
        }
        $('#nama_bayi').change(updateNamaIbu);
    </script>
</head>
<body>

@include('layouts.partials.navbar')

<main class="container">
    @yield('content')
</main>

<script src="{!! url('assets/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>

</body>
</html>
