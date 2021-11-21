@extends('admin.layouts.admin')

@section('main-content')
<div class="col-12">
    <div class="row">
        <div class="col-12">
            @if (session('status') && session('action'))
            <div class="alert alert-success" role="alert">
                <p>La habilidad ha sido {{ session('action') }} exitosamente.</p>
            </div>
            @elseif(session('action'))
            <div class="alert alert-danger" role="alert">
                <p>La habilidad no pudo ser {{ session('action') }}. Por favor, intente nuevamente más tarde.</p>
            </div>
            @endif
        </div>

        <div class="col-12">
            <form action="{{ route('user.update', $user) }}" enctype="multipart/form-data" method="POST">

                <div class="row mt-3">
                    <div class="col-md-4">
                        <label class="text-gray-700 text-sm font-bold mb-2">
                            Nombre
                        </label>
                        <input id="name" type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}">
                        @error('name')
                        <div class="bg-danger w-100 p-3 text-white m-2 rounded-3 mx-0">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label class="text-gray-700 text-sm font-bold mb-2">
                            Título
                        </label>
                        <input id="job_title" type="text" name="job_title" class="form-control" value="{{ old('job_title', $user->job_title) }}">
                        @error('job_title')
                        <div class="bg-danger w-100 p-3 text-white m-2 rounded-3 mx-0">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        @if ($user->image)
                        <img class="card-img-top" src="{{ $user->get_image }}" alt="{{ $user->name }}">
                        @else
                        <img class="card-img-top" src="http://lorempixel.com/400/200/" alt="Card image cap">
                        @endif
                        <input type="file" name="file">
                        @error('file')
                        <div class="bg-danger w-100 p-3 text-white m-2 rounded-3 mx-0">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label class="text-gray-700 text-sm font-bold mb-2">
                            Teléfono
                        </label>
                        <input id="phone_number" type="text" name="phone_number" class="form-control" value="{{ old('phone_number', $user->phone_number) }}">
                        @error('phone_number')
                        <div class="bg-danger w-100 p-3 text-white m-2 rounded-3 mx-0">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label class="text-gray-700 text-sm font-bold mb-2">
                            Dirección
                        </label>
                        <input id="address" type="text" name="address" class="form-control" value="{{ old('address', $user->address) }}">
                        @error('address')
                        <div class="bg-danger w-100 p-3 text-white m-2 rounded-3 mx-0">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                @csrf
                @method('PUT')
                <button type="submit" class="site-btn mt-2">Guardar Cambios</button>
            </form>
        </div>
    </div>
</div>

<section class="container fluid p-4">



    <div class="col-12">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="skills-tab" data-bs-toggle="tab" data-bs-target="#skills" type="button" role="tab" aria-controls="skills" aria-selected="true">Skills</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Contact</button>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="skills" role="tabpanel" aria-labelledby="skills-tab">
                <div class="d-flex align-items-start">
                    <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <button class="nav-link active" id="v-pills-new-tab" data-bs-toggle="pill" data-bs-target="#v-pills-new" type="button" role="tab" aria-controls="v-pills-new" aria-selected="true">Agregar Habilidad</button>
                        <button class="nav-link" id="v-pills-edit-tab" data-bs-toggle="pill" data-bs-target="#v-pills-edit" type="button" role="tab" aria-controls="v-pills-edit" aria-selected="false">Editar Habilidades</button>
                    </div>
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-new" role="tabpanel" aria-labelledby="v-pills-new-tab">
                            @include('admin.includes.skills-create')
                        </div>
                        <div class="tab-pane fade" id="v-pills-edit" role="tabpanel" aria-labelledby="v-pills-edit-tab">
                            @include('admin.includes.skills-edit')
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
        </div>
    </div>
</section>

@endsection