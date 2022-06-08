<nav class="navbar navbar-expand-lg bg-secondary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">ViP</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('category')}}">Categories</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('video')}}">Videos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('users')}}">Users</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('about')}}">About</a>
          </li>
        </ul>
        <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Dropdown
                </a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                  <li><a class="dropdown-item" href="{{route('dashboard')}}">Dashboard</a></li>
                  <li><a class="dropdown-item" href="{{route('logout')}}">Logout</a></li>
                </ul>
              </li>
            </ul>
        </div>
    </div>
    </div>
</nav>
