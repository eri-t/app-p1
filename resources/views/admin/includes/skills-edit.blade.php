@foreach ($user->skills as $skill)
<div class="row mt-4">
    <div class="col-sm-auto flex-grow-1" style="max-width:950px;">
        <!-- TODO: Add row with column titles -->
        <form action="{{ route('skill.update', $skill) }}" method="POST">
            <div class="row">
                <div class="col-sm-auto">
                    <label for="skill-{{ $skill->id }}" class="visually-hidden">
                        Habilidad
                    </label>
                    <input id="skill-{{ $skill->id }}" type="text" name="skill-name" class="form-control" value="{{ old('name', $skill->name) }}">
                </div>

                <div class="col d-flex flex-column justify-content-center">
                    <div class="row">
                        <div class="col-10 col-sm-11">
                            <label for="skill-percent-{{ $skill->id }}" class="visually-hidden">
                                Porcentaje
                            </label>
                            <input 
                                id="skill-percent-{{ $skill->id }}" 
                                type="range" 
                                class="form-range" 
                                min="0" 
                                max="100" 
                                step="1" 
                                name="percent" 
                                value="{{ old('percent', $skill->percent) }}" 
                                onChange="
                                    let id = '{{ $skill->id }}';
                                    document.getElementById('rangeval-' + id).innerText=document.getElementById('skill-percent-' + id).value" 
                                    style="max-width:500px;"
                                    >
                        </div>
                        <div class="col-2 col-sm-1 d-flex justify-content-end">
                            <span id="rangeval-{{ $skill->id }}">
                                {{ $skill->percent }}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-sm-auto d-flex align-items-end">
                    @csrf
                    @method('PUT')
                    <button class="btn btn-warning mt-1" type="submit">Actualizar</button>
                </div>
            </div>
        </form>
    </div>

    <div class="col-sm-auto d-flex align-items-end">
        <form action="{{ route('skill.destroy', $skill) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger mt-1" type="submit">Eliminar</button>
        </form>
    </div>

</div>
@endforeach