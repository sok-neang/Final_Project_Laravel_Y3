   <nav class="navbar navbar-expand-lg border-bottom position-sticky top-0 bg-light shadow-sm z-3">
      <div class="container">
        <a class="navbar-brand" href="/">
          <img width="200px" src="{{ asset('storage/uploads/our_logo.png') }}" alt="My Logo">
        </a>
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
          <ul class="navbar-nav ms-auto d-flex align-items-center">
            <li class="nav-item">
              <a class="nav-link text-active px-3 py-2" href="{{route('home')}}"><i class="fa-solid fa-house"></i>Home</a>
            </li>

            <li class="nav-item position-relative dropdown">
              <a class="nav-link px-3 py-2 bg-gray-300" href="{{route('allcourses')}}"><i class="fa-solid fa-book"></i>All Courses</a>
              <ul class="list-unstyled position-absolute dropdown-menu">
                @foreach ($nav_categories as $navbar)
                    <li class="nav-item">
                      <a class="nav-link text-dark px-3" href="{{route('home', ['category_id'=>$navbar->id])}}">{{$navbar->name}}</a>
                    </li>
                @endforeach
              </ul>
            </li>

            <li class="nav-item">
              <a class="nav-link px-3 py-2" href="{{route('home')}}"><i class="fa-solid fa-film"></i>Videos</a>
            </li>


            <li class="nav-item">
              <a class="nav-link px-3 py-2" href="{{route('about')}}"><i class="fa-regular fa-address-card"></i>About Us</a>
            </li>

            @if(Auth::check())
              <li class="nav-item dropdown">

                  <img src="{{ asset('storage/' . auth()->user()->profile) }}" alt="Admin Profile" width="80" class="nav-link dropdown-toggle text-dark px-3"
                  href="#"
                  id="navbarDropdown"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false" style="border-radius: 50%">

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
                    class="btn btn-sm btn-logout px-3 py-2 text-light"
                    role="button"
                    type="submit"
                    >Logout
                  </button>
                </form>
              </li>
            @else
              <li class="nav-item px-2">
                <a class="nav-link text-light px-3 btn-login" href="{{ route('login') }}">Login</a>
              </li>
              <li class="nav-item px-2">
                <a class="nav-link text-light px-3 btn-login" href="{{ route('register') }}">Register</a>
              </li>
            @endif

          </ul>
        </div>
      </div>
    </nav>