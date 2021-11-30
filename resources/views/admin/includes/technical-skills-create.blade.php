<form action="{{ route('skill.store') }}" method="POST">

    <div class="row mt-3" style="max-width:950px;">
        <div class="col-sm-auto">
            <label for="skill-name" class="form-label">
                Nueva Habilidad
            </label>

            <input id="skill-name" type="text" name="skill-name" class="form-control" placeholder="Nueva Habilidad">
        </div>

        <div class="col d-flex flex-column justify-content-center">
            <div class="row">
                <div class="col-12">
                    <label for="percent" class="form-label">
                        Porcentaje
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="col-10 col-sm-11">
                    <input id="percent1" type="range" class="form-range" min="0" max="100" step="1" name="percent" onChange="
                            document.getElementById('rangeval1').innerText=document.getElementById('percent1').value" style="max-width:500px;">
                </div>
                <div class="col-2 col-sm-1 d-flex justify-content-end">
                    <span id="rangeval1">
                        50
                        <!-- Default value -->
                    </span>
                </div>
            </div>
        </div>

        <div class="col-sm-auto d-flex align-items-end">
            <input type="hidden" name="user_id" value="{{ $user->id }}">
            <input type="hidden" name="type" value="technical">
            @csrf
            <button class="btn btn-success mt-1" type="submit">Agregar</button>
        </div>
    </div>
</form>