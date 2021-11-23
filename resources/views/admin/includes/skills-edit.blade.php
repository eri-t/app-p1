@foreach ($user->skills as $skill)
<div class="row mt-3">
    <div class="col-sm-auto">
        <form action="{{ route('skill.update', $skill) }}" method="POST">
            <div class="row">
                <div class="col-sm-auto">
                    <label for="skill-{{ $skill->id }}" class="visually-hidden">
                        Habilidad
                    </label>
                    <input id="skill-{{ $skill->id }}" type="text" name="skill-name[]" class="form-control" value="{{ old('name', $skill->name) }}">
                    @error('skill-name.*')
                    <div class="bg-danger w-100 px-3 py-2 text-white m-2 rounded-3 mx-0">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-sm-auto">
                    <label for="skill-percent-{{ $skill->id }}" class="visually-hidden">
                        Porcentaje
                    </label>
                    <input id="skill-percent-{{ $skill->id }}" type="text" name="percent[]" class="form-control" value="{{ old('percent', $skill->percent) }}">
                    @error('percent.*')
                    <div class="bg-danger w-100 px-3 py-2 text-white m-2 rounded-3 mx-0">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-sm-auto d-flex align-items-end">
                    @csrf
                    @method('PUT')
                    <button class="btn btn-warning mt-1" type="submit" class="site-btn">Actualizar</button>
                </div>
            </div>
        </form>
    </div>

    <div class="col-sm-auto d-flex align-items-end">
        <form action="{{ route('skill.destroy', $skill) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger mt-1" type="submit" class="site-btn">Eliminar</button>
        </form>
    </div>

</div>
@endforeach