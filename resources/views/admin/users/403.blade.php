@extends('admin.layouts.admin')

@section('main-content')
<div class="col-12 d-flex flex-column align-items-center pt-5">
    <h1 class="text-center pt-5">403</h1>
    <h2 class="text-center">Permiso denegado</h2>
    <p class="text-center">La página solicitada no está disponible</p>

    <a href="{{ route('/') }}">Home</a>
</div>
@endsection