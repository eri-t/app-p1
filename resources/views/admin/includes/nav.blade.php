<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a href="{{ route('/') }}" class="navbar-brand">Portfolio</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">

        @if (Auth::user()->hasRole('admin'))
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ url('/users')  }}">Usuarios</a>
        </li>
        @endif

        <li class="nav-item">
          <a class="nav-link {{ Auth::user()->hasRole('client') ? 'active' : '' }}" {{ Auth::user()->hasRole('client') ? 'aria-current="page"' : '' }} href="{{ url('user/' . Auth::user()->id . '/edit')  }}">Mis datos</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('logout-user') }}" tabindex="-1">Logout</a>
        </li>
      </ul>

    </div>
  </div>
</nav>