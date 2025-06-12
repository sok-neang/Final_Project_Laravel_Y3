   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="/">Blog Name</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0 d-flex align-items-center">
            <li class="nav-item">
              <a class="nav-link text-light px-3" href="{{route('home')}}">Home</a>
            </li>

            @foreach ($nav_categories as $navbar)
              <li class="nav-item">
              <a class="nav-link text-light px-3" href="{{route('home', ['category_id'=>$navbar->id])}}">{{$navbar->name}}</a>
            </li>
            @endforeach

            <li class="nav-item">
              <a class="nav-link text-light px-3" href="#">About</a>
            </li>

            @if(Auth::check())
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle text-light px-3"
                  href="#"
                  id="navbarDropdown"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  Manage
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li>
                    <a class="dropdown-item" href="{{route("Admin.Category.index")}}"
                      >Category</a
                    >
                  </li>
                  <li>
                    <a class="dropdown-item" href="{{route("Admin.tag.index")}}">Tag</a>
                  </li>
                  <li><hr class="dropdown-divider" /></li>
                  <li>
                    <a class="dropdown-item" href="{{route("Admin.post.index")}}"
                      >Post</a
                    >
                  </li>
                </ul>
              </li>
              <li class="nav-item active">
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button
                    class="btn btn-danger btn-sm"
                    role="button"
                    type="submit"
                    >Logout
                  </button>
                </form>
              </li>
            @else
              <li class="nav-item">
                <a class="nav-link active" href="{{ route('login') }}">Login</a>
              </li>
            @endif

          </ul>
        </div>
      </div>
    </nav>