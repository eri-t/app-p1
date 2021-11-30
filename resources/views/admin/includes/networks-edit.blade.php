@foreach ($user->networks as $network)
<div class="row mt-4">
    <div class="col-sm-auto flex-grow-1" style="max-width:500px;">
        <form action="{{ route('network.update', $network) }}" method="POST">

            <input type="hidden" name="user_id" value="{{ $user->id }}">
            <div class="row">

                <div class="col">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="switch-{{$network->id}}" name="active" value="1" {{ old('pivot.active', $network->pivot->active) ? "checked" : "" }}>
                        <label class="form-check-label" for="switch-{{$network->id}}">{{ $network->name }}</label>
                    </div>
                </div>

                <div class="col-sm-auto">
                    <label for="slug-{{$network->id}}" class="visually-hidden">
                        {{$network->name}} slug
                    </label>
                    <input id="slug-{{$network->id}}" type="text" name="url" class="form-control" value="{{ old('pivot.url', $network->pivot->url) }}" placeholder="Nombre de usuario">
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
        <form action="{{ route('network.destroy', $network) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger mt-1" type="submit">Eliminar</button>
        </form>
    </div>

</div>
@endforeach