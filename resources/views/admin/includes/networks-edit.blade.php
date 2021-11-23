@foreach ($user->networks as $network)
<div class="row mt-3">
    <div class="col-sm-auto">
        <form action="{{ route('network.update', $network) }}" method="POST">
            <div class="row">
                <div class="col-sm-auto">
                    <label for="network-{{$network->id}}" class="visually-hidden">
                        Red social
                    </label>
                    <input id="network-{{$network->id}}" type="text" name="name" class="form-control" value="{{ old('name', $network->name) }}">
                </div>

                <div class="col-sm-auto">
                    <label for="url-{{$network->id}}" class="visually-hidden">
                        URL
                    </label>
                    <input id="url-{{$network->id}}" type="text" name="url" class="form-control" value="{{ old('url', $network->url) }}">
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