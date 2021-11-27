@extends('admin.layouts.admin')

@section('main-content')
<div class="col-12">
    <div class="row">
        <div class="col-12 pt-2">
            @if (session('status') && session('action'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <p class="mb-0">La habilidad ha sido {{ session('action') }} exitosamente.</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @elseif(session('action'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <p class="mb-0">La habilidad no pudo ser {{ session('action') }}. Por favor, intente nuevamente más tarde.</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
        </div>

        <div class="col-12 pt-2">
            @error('skill-name')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <p class="mb-0">{{ $message }}</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @enderror

            @error('percent')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <p class="mb-0">{{ $message }}</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @enderror
        </div>

        <div class="col-12">
            <form action="{{ route('user.update', $user) }}" enctype="multipart/form-data" method="POST">

                <div class="row mt-3">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-lg-6 pt-3">
                                <label class="form-label">
                                    Nombre <span class="small text-secondary fst-italic">(Requerido)</span>
                                </label>
                                <input id="name" type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}">
                                @error('name')
                                <div class="bg-danger w-100 px-3 py-2 text-white m-2 rounded-3 mx-0">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6 pt-3">
                                <label class="form-label">
                                    Título <span class="small text-secondary fst-italic">(Requerido)</span>
                                </label>
                                <input id="job_title" type="text" name="job_title" class="form-control" value="{{ old('job_title', $user->job_title) }}">
                                @error('job_title')
                                <div class="bg-danger w-100 px-3 py-2 text-white m-2 rounded-3 mx-0">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6 pt-3">
                                <label class="form-label">
                                    Email <span class="small text-secondary fst-italic">(Requerido)</span>
                                </label>
                                <input id="email" type="text" name="email" class="form-control" value="{{ old('email', $user->email) }}">
                                @error('email')
                                <div class="bg-danger w-100 px-3 py-2 text-white m-2 rounded-3 mx-0">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6 pt-3">
                                <label class="form-label">
                                    Slug <span class="small text-secondary fst-italic">(Requerido)</span>
                                </label>
                                <input id="slug" type="text" name="slug" class="form-control" value="{{ old('slug', $user->slug) }}">
                                @error('slug')
                                <div class="bg-danger w-100 px-3 py-2 text-white m-2 rounded-3 mx-0">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6 pt-3">
                                <label class="form-label">
                                    Teléfono <span class="small text-secondary fst-italic">(Requerido)</span>
                                </label>
                                <input id="phone_number" type="text" name="phone_number" class="form-control" value="{{ old('phone_number', $user->phone_number) }}">
                                @error('phone_number')
                                <div class="bg-danger w-100 px-3 py-2 text-white m-2 rounded-3 mx-0">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6 pt-3">
                                <label class="form-label">
                                    Dirección <span class="small text-secondary fst-italic">(Requerido)</span>
                                </label>
                                <input id="address" type="text" name="address" class="form-control" value="{{ old('address', $user->address) }}">
                                @error('address')
                                <div class="bg-danger w-100 px-3 py-2 text-white m-2 rounded-3 mx-0">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 pt-3">
                        <label for="file" class="form-label">
                            Imagen de perfil <span class="small text-secondary fst-italic">(Tamaño mínimo: 425px de ancho y de alto)</span>
                        </label>
                        @if ($user->image)
                        <img class="img-fluid mb-1 rounded-circle" src="{{ $user->get_image }}" alt="{{ $user->name }}">
                        @else
                        <img class="img-fluid mb-1" src="https://parcial1.test/assets/images/hero.png" alt="Default profile picture">
                        @endif
                        <input class="form-control" type="file" name="file" id="file">
                        @error('file')
                        <div class="bg-danger w-100 px-3 py-2 text-white m-2 rounded-3 mx-0">{{ $message }}</div>
                        @enderror

                    </div>

                </div>

                @csrf
                @method('PUT')
                <button type="submit" class="btn btn-primary my-3">Guardar Cambios</button>
            </form>
        </div>
    </div>
</div>

<section class="container fluid p-4">

    <div class="col-12">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="skills-tab" data-bs-toggle="tab" data-bs-target="#skills" type="button" role="tab" aria-controls="skills" aria-selected="true">Habilidades</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="social-tab" data-bs-toggle="tab" data-bs-target="#social" type="button" role="tab" aria-controls="social" aria-selected="false">Redes Sociales</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Contacto</button>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="skills" role="tabpanel" aria-labelledby="skills-tab">
                <div class="d-flex align-items-start">
                    <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <button class="nav-link active my-1" id="v-pills-new-tab" data-bs-toggle="pill" data-bs-target="#v-pills-new" type="button" role="tab" aria-controls="v-pills-new" aria-selected="true">Agregar Habilidad</button>
                        @if (count($user->skills)>0)
                        <button class="nav-link my-1" id="v-pills-edit-tab" data-bs-toggle="pill" data-bs-target="#v-pills-edit" type="button" role="tab" aria-controls="v-pills-edit" aria-selected="false">Editar Habilidades</button>
                        @endif
                    </div>
                    <div class="tab-content flex-grow-1" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-new" role="tabpanel" aria-labelledby="v-pills-new-tab">
                            @include('admin.includes.skills-create')
                        </div>

                        <div class="tab-pane fade" id="v-pills-edit" role="tabpanel" aria-labelledby="v-pills-edit-tab">
                            @include('admin.includes.skills-edit')
                        </div>

                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="social" role="tabpanel" aria-labelledby="social-tab">
                <div class="d-flex align-items-start">
                    <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                        <button class="nav-link active my-1" id="v-pills-edit-tab" data-bs-toggle="pill" data-bs-target="#v-pills-edit" type="button" role="tab" aria-controls="v-pills-edit" aria-selected="false">Editar Redes Sociales</button>

                    </div>
                    <div class="tab-content flex-grow-1" id="v-pills-tabContent">
<!-- TODO: Delete networks-create.blade.php file -->
                        <div class="tab-pane fade show active" id="v-pills-edit" role="tabpanel" aria-labelledby="v-pills-edit-tab">
                            @include('admin.includes.networks-edit')
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
        </div>
    </div>
</section>

@endsection