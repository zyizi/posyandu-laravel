@extends('layouts.app-master')

@section('content')

<div class="bg-light p-5 rounded">
    @auth
    <h1>Dashboard</h1>
    <p class="lead">Selamat datang Admin.</p>
    @endauth

    @guest
    <h1>Posyandu Prototype</h1>
    <p class="lead">Selamat datang, silakan untuk Login</p>
    @endguest
</div>
@endsection
