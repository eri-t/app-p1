@foreach ($user->networks as $network)
<div class="row mt-3">
    <div class="col-sm-auto">
        <form action="{{ route('network.update', $network) }}" method="POST">
            <p>{{ $network }}</p>
            <p>{{ $network->pivot }}</p>
            <input type="hidden" name="user_id" value="{{ $user->id }}">
            <div class="row">

                <div class="col-sm-auto">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="switch-{{$network->id}}" name="active" checked="{{ $network->pivot->active }}">
                        <label class="form-check-label" for="switch-{{$network->id}}">{{ $network->name }}</label>

                    </div>
                </div>

                <div class="col-sm-auto">
                    <label for="slug-{{$network->id}}" class="visually-hidden">
                        {{$network->name}} slug
                    </label>
                    <input id="slug-{{$network->id}}" type="text" name="url" class="form-control" value=" {{ old('pivot.url', $network->pivot->url) }}" placeholder="Nombre de usuario">

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
        <form action="{{ route('network.destroy', $network) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger mt-1" type="submit" class="site-btn">Eliminar</button>
        </form>
    </div>

</div>
@endforeach