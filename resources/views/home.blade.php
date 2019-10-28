@extends('layouts.app')
@section('content')
    <h1>Bienvenido, ha ingredado exitosamente al sistema</h1>
    <h2> Esta logeado como {{ Auth::user()->nombre }}</h2>
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
@endsection
