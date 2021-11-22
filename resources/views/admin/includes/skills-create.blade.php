<form action="{{ route('skill.store') }}" method="POST">

    <div class="row mt-3">
        <div class="col-sm-auto">
            <label for="name" class="form-label">
                Nueva Habilidad
            </label>

            <input id="name" type="text" name="name" class="form-control" placeholder="Nueva Habilidad">
        </div>

        <div class="col-sm-auto">
            <label for="percent" class="form-label">
                Porcentaje
            </label>

            <input id="percent" type="text" name="percent" class="form-control" placeholder="Porcentaje">
        </div>

        <div class="col-sm-auto d-flex align-items-end">
            <input type="hidden" name="user_id" value="{{ $user->id }}">
            @csrf
            <button class="btn btn-success mt-1" type="submit" class="site-btn">Agregar</button>
        </div>
    </div>
</form>