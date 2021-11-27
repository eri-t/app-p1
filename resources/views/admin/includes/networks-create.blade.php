<form action="{{ route('network.store') }}" method="POST">

    <div class="row mt-3">
        <div class="col-sm-auto">
            <label for="network-name" class="form-label">
                Nueva Red Social
            </label>

            <input id="network-name" type="text" name="network-name" class="form-control" placeholder="Nueva Red Social">
        </div>

        <div class="col-sm-auto">
            <label for="url" class="form-label">
               Url
            </label>

            <input id="url" type="text" name="url" class="form-control" placeholder="URL">
        </div>

        <div class="col-sm-auto d-flex align-items-end">
            <input type="hidden" name="user_id" value="{{ $user->id }}">
            @csrf
            <button class="btn btn-success mt-1" type="submit" class="site-btn">Agregar</button>
        </div>
    </div>
</form>