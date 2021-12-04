@extends('admin.layouts.admin')

@section('main-content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 pt-2">
            @if (session('status') && session('action'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <p class="mb-0">{{ session('field') }} ha sido {{ session('action') }} exitosamente.</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @elseif(session('action'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <p class="mb-0">{{ session('field') }} no pudo ser {{ session('action') }}. Por favor, intente nuevamente más tarde.</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
        </div>
    </div>
</div>

<div class="container">
    <div class="row">

        @foreach ($users as $user)
        <div class="col-sm-6 col-lg-4 col-xl-3 d-flex">
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
                                <input value="Eliminar" class="btn btn-danger w-100 mt-1" type="submit" onclick="return confirm('¿Desea eliminar este usuario? Esta acción no puede deshacerse.')" {{ $user->hasRole('admin') ? "disabled" : "" }}>
                                </input>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection