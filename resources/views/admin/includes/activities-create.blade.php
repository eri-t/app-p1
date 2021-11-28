<form action="{{ route('activity.store') }}" method="POST">

    <div class="row mt-3" style="max-width:950px;">
        <div class="col-sm-auto">
            <label for="activity-title" class="form-label">
                Nueva Actividad
            </label>

            <input id="activity-title" type="text" name="activity-title" class="form-control">
        </div>

        <div class="col d-flex flex-column justify-content-center">
            <label for="activity-description" class="form-label">
                Descripción
            </label>
            <textarea id="activity-description" type="text" class="form-control" name="activity-description" rows="3"></textarea>
        </div>

        <div class="col-sm-auto d-flex align-items-end">
            <input type="hidden" name="user_id" value="{{ $user->id }}">
            @csrf
            <button class="btn btn-success mt-1" type="submit" class="site-btn">Agregar</button>
        </div>
    </div>
</form>