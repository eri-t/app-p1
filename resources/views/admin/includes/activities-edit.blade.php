@foreach ($user->activities as $activity)
<div class="row mt-4">
    <div class="col-sm-auto flex-grow-1" style="max-width:1200px;">
        <!-- TODO: Add row with column titles -->
        <form action="{{ route('activity.update', $activity) }}" method="POST">
            <div class="row">
                <div class="col-sm-auto">
                    <label for="activity-title-{{ $activity->id }}" class="visually-hidden">
                        Título
                    </label>
                    <input id="activity-title-{{ $activity->id }}" type="text" name="activity-title" class="form-control" value="{{ old('title', $activity->title) }}" placeholder="Título">
                </div>

                <div class="col-sm-auto flex-grow-1">
                    <label for="activity-description-{{$activity->id}}" class="visually-hidden">
                        Descripción
                    </label>
                    <textarea id="activity-description-{{$activity->id}}" type="text" class="form-control" name="activity-description" rows="3" placeholder="Descripción">{{ $activity->description }}</textarea>
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
        <form action="{{ route('activity.destroy', $activity) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger mt-1" type="submit">Eliminar</button>
        </form>
    </div>

</div>
@endforeach