@extends('admin.layouts.admin')

@section('main-content')
<div class="col-12">
    <div class="row">
        <div class="col-12 pt-2">
            @if (session('status') && session('action'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <p class="mb-0">La {{ session('field') }} ha sido {{ session('action') }} exitosamente.</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @elseif(session('action'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <p class="mb-0">La {{ session('field') }} no pudo ser {{ session('action') }}. Por favor, intente nuevamente más tarde.</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
        </div>

        <div class="col-12 pt-2">
            <!-- Skills section errors -->
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

            <!-- Activities section errors -->
            @error('activity-title')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <p class="mb-0">{{ $message }}</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @enderror

            @error('activity-description')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <p class="mb-0">{{ $message }}</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @enderror
        </div>

        <div class="col-12">
            <form action="{{ route('user.update', $user) }}" enctype="multipart/form-data" method="POST">
                <fieldset>
                    <div class="row mt-3">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-lg-6 pt-3">
                                    <label for="email" class="form-label">
                                        Email <span class="small text-secondary fst-italic">(Requerido)</span>
                                    </label>
                                    <input id="email" type="text" name="email" class="form-control" value="{{ old('email', $user->email) }}">
                                    @error('email')
                                    <div class="bg-danger w-100 px-3 py-2 text-white m-2 rounded-3 mx-0">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-6 pt-3">
                                    <label for="slug" class="form-label">
                                        Slug <span class="small text-secondary fst-italic">(Requerido)</span>
                                    </label>
                                    <input id="slug" type="text" name="slug" class="form-control" value="{{ old('slug', $user->slug) }}">
                                    @error('slug')
                                    <div class="bg-danger w-100 px-3 py-2 text-white m-2 rounded-3 mx-0">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </div>
                </fieldset>

                <fieldset>
                    <legend class="mt-5">Home</legend>
                    <div class="row mt-3">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-lg-6 pt-3">
                                    <label for="name" class="form-label">
                                        Nombre <span class="small text-secondary fst-italic">(Requerido)</span>
                                    </label>
                                    <input id="name" type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}">
                                    @error('name')
                                    <div class="bg-danger w-100 px-3 py-2 text-white m-2 rounded-3 mx-0">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-6 pt-3">
                                    <label for="phone_number" class="form-label">
                                        Teléfono
                                    </label>
                                    <input id="phone_number" type="text" name="phone_number" class="form-control" value="{{ old('phone_number', $user->phone_number) }}">
                                    @error('phone_number')
                                    <div class="bg-danger w-100 px-3 py-2 text-white m-2 rounded-3 mx-0">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-6 pt-3">
                                    <label for="address" class="form-label">
                                        Dirección
                                    </label>
                                    <input id="address" type="text" name="address" class="form-control" value="{{ old('address', $user->address) }}">
                                    @error('address')
                                    <div class="bg-danger w-100 px-3 py-2 text-white m-2 rounded-3 mx-0">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-6 pt-3">
                                    <label for="job_title" class="form-label">
                                        Título
                                    </label>
                                    <input id="job_title" type="text" name="job_title" class="form-control" value="{{ old('job_title', $user->job_title) }}">
                                    @error('job_title')
                                    <div class="bg-danger w-100 px-3 py-2 text-white m-2 rounded-3 mx-0">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-6 pt-3">
                                    <label for="introduction" class="form-label">
                                        Texto introductorio
                                    </label>
                                    <input id="introduction" type="text" name="introduction" class="form-control" value="{{ old('introduction', $user->introduction) }}" placeholder="Hello I'm">
                                    @error('introduction')
                                    <div class="bg-danger w-100 px-3 py-2 text-white m-2 rounded-3 mx-0">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 pt-3">
                            <label for="file" class="form-label">
                                Imagen de perfil <span class="small text-secondary fst-italic">(Tamaño mínimo sugerido: 425px de ancho y de alto)</span>
                            </label>
                            @if ($user->image)
                            <img class="img-fluid mb-1 rounded-circle" src="{{ $user->get_image }}" alt="{{ $user->name }}">
                            @else
                            <img class="img-fluid mb-1" src="https://parcial1.test/assets/images/hero.png" alt="Default profile picture">
                            @endif
                            <input class="form-control" type="file" name="file" id="file" accept=".jpg,.png">
                            @error('file')
                            <div class=" bg-danger w-100 px-3 py-2 text-white m-2 rounded-3 mx-0">{{ $message }}
                            </div>
                            @enderror

                        </div>

                    </div>
                </fieldset>

                <fieldset>
                    <legend class="mt-5">About</legend>
                    <div class="row mt-3">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-lg-6 pt-3">
                                    <label for="about_title" class="form-label">
                                        Título de la sección
                                    </label>
                                    <input id="about_title" type="text" name="about_title" class="form-control" value="{{ old('about_title', $user->about_title) }}" placeholder="About Me">
                                    @error('about_title')
                                    <div class="bg-danger w-100 px-3 py-2 text-white m-2 rounded-3 mx-0">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 pt-3">
                                    <label for="excerpt" class="form-label">
                                        Resumen
                                    </label>
                                    <textarea id="excerpt" type="text" class="form-control" name="excerpt" rows="3">{{ $user->excerpt }}</textarea>
                                    @error('excerpt')
                                    <div class="bg-danger w-100 px-3 py-2 text-white m-2 rounded-3 mx-0">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-6 pt-3">
                                    <label for="about_subtitle" class="form-label">
                                        Subtítulo de la sección
                                    </label>
                                    <input id="about_subtitle" type="text" name="about_subtitle" class="form-control" value="{{ old('about_subtitle', $user->about_subtitle) }}" placeholder="What I do">
                                    @error('about_subtitle')
                                    <div class="bg-danger w-100 px-3 py-2 text-white m-2 rounded-3 mx-0">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 pt-3">
                            <label for="about_img" class="form-label">
                                Imagen de la sección <span class="small text-secondary fst-italic">(Tamaño sugerido: 1568px de ancho y 961px de alto)</span>
                            </label>
                            @if ($user->about_img)
                            <img class="img-fluid mb-1" src="{{ $user->get_about_img }}" alt="About section image added by {{ $user->name }}">
                            @else
                            <img class="img-fluid mb-1" src="https://parcial1.test/assets/images/ab-img.png" alt="Default image for About section">
                            @endif
                            <input class="form-control" type="file" name="about_img" id="about_img" accept=".jpg,.png">
                            @error('about_img')
                            <div class="bg-danger w-100 px-3 py-2 text-white m-2 rounded-3 mx-0">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                </fieldset>

                <fieldset>
                    <legend class="mt-5">Skills</legend>
                    <div class="row mt-3">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-lg-6 pt-3">
                                    <label for="skills_title_1" class="form-label">
                                        Título de la primera sección
                                    </label>
                                    <input id="skills_title_1" type="text" name="skills_title_1" class="form-control" value="{{ old('skills_title_1', $user->skills_title_1) }}" placeholder="About Me">
                                    @error('skills_title_1')
                                    <div class="bg-danger w-100 px-3 py-2 text-white m-2 rounded-3 mx-0">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-6 pt-3">
                                    <label for="skills_title_2" class="form-label">
                                        Título de la segunda sección
                                    </label>
                                    <input id="skills_title_2" type="text" name="skills_title_2" class="form-control" value="{{ old('skills_title_2', $user->skills_title_2) }}" placeholder="Technical Skills">
                                    @error('skills_title_2')
                                    <div class="bg-danger w-100 px-3 py-2 text-white m-2 rounded-3 mx-0">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                        </div>
                    </div>
                </fieldset>
                @csrf
                @method('PUT')
                <button type="submit" class="btn btn-success my-3">Guardar Cambios</button>
            </form>
        </div>
    </div>
</div>

<section class="container fluid p-4 mt-5">

    <div class="col-12">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="technical-skills-tab" data-bs-toggle="tab" data-bs-target="#technical-skills" type="button" role="tab" aria-controls="technical-skills" aria-selected="true">Habilidades Técnicas</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="professional-skills-tab" data-bs-toggle="tab" data-bs-target="#professional-skills" type="button" role="tab" aria-controls="professional-skills" aria-selected="true">Habilidades Profesionales</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="social-tab" data-bs-toggle="tab" data-bs-target="#social" type="button" role="tab" aria-controls="social" aria-selected="false">Redes Sociales</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="activities-tab" data-bs-toggle="tab" data-bs-target="#activities" type="button" role="tab" aria-controls="activities" aria-selected="false">Actividades</button>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="technical-skills" role="tabpanel" aria-labelledby="technical-skills-tab">
                <div class="d-flex align-items-start">
                    <div class="nav flex-column nav-pills me-3" id="v-pills-tab-1" role="tablist" aria-orientation="vertical">
                        <button class="nav-link active my-1" id="v-pills-new-1-tab" data-bs-toggle="pill" data-bs-target="#v-pills-new-1" type="button" role="tab" aria-controls="v-pills-new-1" aria-selected="true">Agregar Habilidad</button>
                        @if (count($user->skills)>0)
                        <button class="nav-link my-1" id="v-pills-edit-1-tab" data-bs-toggle="pill" data-bs-target="#v-pills-edit-1" type="button" role="tab" aria-controls="v-pills-edit-1" aria-selected="false">Editar Habilidades</button>
                        @endif
                    </div>
                    <div class="tab-content flex-grow-1" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-new-1" role="tabpanel" aria-labelledby="v-pills-new-1-tab">
                            @include('admin.includes.technical-skills-create')
                        </div>

                        <div class="tab-pane fade" id="v-pills-edit-1" role="tabpanel" aria-labelledby="v-pills-edit-1-tab">
                            @include('admin.includes.technical-skills-edit')
                        </div>

                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="professional-skills" role="tabpanel" aria-labelledby="professional-skills-tab">
                <div class="d-flex align-items-start">
                    <div class="nav flex-column nav-pills me-3" id="v-pills-tab-4" role="tablist" aria-orientation="vertical">
                        <button class="nav-link active my-1" id="v-pills-new-4-tab" data-bs-toggle="pill" data-bs-target="#v-pills-new-4" type="button" role="tab" aria-controls="v-pills-new-4" aria-selected="true">Agregar Habilidad</button>
                        @if (count($user->skills)>0)
                        <button class="nav-link my-1" id="v-pills-edit-4-tab" data-bs-toggle="pill" data-bs-target="#v-pills-edit-4" type="button" role="tab" aria-controls="v-pills-edit-4" aria-selected="false">Editar Habilidades</button>
                        @endif
                    </div>
                    <div class="tab-content flex-grow-1" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-new-4" role="tabpanel" aria-labelledby="v-pills-new-4-tab">
                            @include('admin.includes.professional-skills-create')
                        </div>

                        <div class="tab-pane fade" id="v-pills-edit-4" role="tabpanel" aria-labelledby="v-pills-edit-4-tab">
                            @include('admin.includes.professional-skills-edit')
                        </div>

                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="social" role="tabpanel" aria-labelledby="social-tab">
                <div class="d-flex align-items-start">
                    <div class="nav flex-column nav-pills me-3" id="v-pills-tab-2" role="tablist" aria-orientation="vertical">

                        <button class="nav-link active my-1" id="v-pills-edit-2-tab" data-bs-toggle="pill" data-bs-target="#v-pills-edit-2" type="button" role="tab" aria-controls="v-pills-edit-2" aria-selected="false">Editar Redes Sociales</button>

                    </div>
                    <div class="tab-content flex-grow-1" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-edit-2" role="tabpanel" aria-labelledby="v-pills-edit-2-tab">
                            @include('admin.includes.networks-edit')
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="activities" role="tabpanel" aria-labelledby="activities-tab">
                <div class="d-flex align-items-start">
                    <div class="nav flex-column nav-pills me-3" id="v-pills-tab-3" role="tablist" aria-orientation="vertical">
                        <button class="nav-link active my-1" id="v-pills-new-2-tab" data-bs-toggle="pill" data-bs-target="#v-pills-new-2" type="button" role="tab" aria-controls="v-pills-new-2" aria-selected="true">Agregar Actividad</button>
                        @if (count($user->activities)>0)
                        <button class="nav-link my-1" id="v-pills-edit-3-tab" data-bs-toggle="pill" data-bs-target="#v-pills-edit-3" type="button" role="tab" aria-controls="v-pills-edit-3" aria-selected="false">Editar Actividades</button>
                        @endif
                    </div>
                    <div class="tab-content flex-grow-1" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-new-2" role="tabpanel" aria-labelledby="v-pills-new-2-tab">
                            @include('admin.includes.activities-create')
                        </div>

                        <div class="tab-pane fade" id="v-pills-edit-3" role="tabpanel" aria-labelledby="v-pills-edit-3-tab">
                            @include('admin.includes.activities-edit')
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection