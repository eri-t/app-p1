@extends('admin.layouts.admin')

@section('main-content')


@foreach ($users as $user)
<div class="col-sm-6 col-md-4 col-lg-3 d-flex">
    <div class="card m-2">
        <div class="card-body d-flex flex-column">

            @if ($user->image)
            <img class="img-fluid rounded-circle" src="{{ $user->get_image }}" alt="{{ $user->name }}">
            @else
            <img class="img-fluid" src="{{ asset('assets/images/hero.png') }}" alt="Default user image">
            @endif

            <h2 class="card-title h5 mt-auto pt-4">{{ $user->uppercase }}</h2>
            <p class="card-text">{{ $user->title_job }}</p>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-sm-6">
                    <a href="{{ route('user.edit', $user) }}" class="btn btn-warning w-100 mt-1">Editar</a>
                </div>
                <div class="col-sm-6">
                    <form action="{{ route('user.destroy', $user) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input 
                            value="Eliminar" 
                            class="btn btn-danger w-100 mt-1" 
                            type="submit" 
                            onclick="return confirm('¿Desea eliminar este usuario? Esta acción no puede deshacerse.')"
                            >
                        </input>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endforeach


@endsection