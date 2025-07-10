@extends('layouts.app')

@section('title', 'Home')

@section('content')


@include('components.banner')

    <div class="container py-5 mt-5">
      <div class="d-flex flex-wrap justify-content-between align-items-center gap-4">
        <div class="brand-logo position-relative p-3 bg-light rounded-circle shadow mx-2 d-flex align-items-center justify-content-center" style="height: 120px; width: 120px;">
          <img src="{{ asset('storage/uploads/logo_image/vs_code.png') }}" alt="VS Code" style="max-height: 70px; max-width: 90px;">
          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary shadow" style="font-size: 0.8rem;">VS Code</span>
        </div>
        <div class="brand-logo position-relative p-3 bg-light rounded-circle shadow mx-2 d-flex align-items-center justify-content-center" style="height: 120px; width: 120px;">
          <img src="{{ asset('storage/uploads/logo_image/github.png') }}" alt="GitHub" style="max-height: 50px; max-width: 90px;">
          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-dark shadow" style="font-size: 0.8rem;">GitHub</span>
        </div>
        <div class="brand-logo position-relative p-3 bg-light rounded-circle shadow mx-2 d-flex align-items-center justify-content-center" style="height: 120px; width: 120px;">
          <img src="{{ asset('storage/uploads/logo_image/stackoverflow.png') }}" alt="Stack Overflow" style="max-height: 70px; max-width: 90px;">
          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning text-dark shadow" style="font-size: 0.8rem;">Stack Overflow</span>
        </div>
        <div class="brand-logo position-relative p-3 bg-light rounded-circle shadow mx-2 d-flex align-items-center justify-content-center" style="height: 120px; width: 120px;">
          <img src="{{ asset('storage/uploads/logo_image/freeCodeCamp.png') }}" alt="freeCodeCamp" style="max-height: 30px; max-width: 90px;">
          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success shadow" style="font-size: 0.8rem;">freeCodeCamp</span>
        </div>
        <div class="brand-logo position-relative p-3 bg-light rounded-circle shadow mx-2 d-flex align-items-center justify-content-center" style="height: 120px; width: 120px;">
          <img src="{{ asset('storage/uploads/logo_image/w3school.png') }}" alt="W3Schools" style="max-height: 40px; max-width: 90px;">
          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success shadow" style="font-size: 0.8rem;">W3Schools</span>
        </div>
        <div class="brand-logo position-relative p-3 bg-light rounded-circle shadow mx-2 d-flex align-items-center justify-content-center" style="height: 120px; width: 120px;">
          <img src="{{ asset('storage/uploads/logo_image/mdn.png') }}" alt="MDN" style="max-height: 70px; max-width: 90px;">
          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-info text-dark shadow" style="font-size: 0.8rem;">MDN</span>
        </div>
      </div>
    </div>
     

    {{-- @include('components.rotating') --}}

    @include('components.scrollbar')

    <div class="container mt-5">
      <div class="row">

          <!-- Search widget-->
            @include('components.serchForm')
          <!-- Tags widget-->
            @include('components.tag')


        <!-- Blog entries-->
        <div class="col-lg-12">
          <!-- Nested row for non-featured blog posts-->
            <div class="row row-cols-1 row-cols-md-3 g-5">
            @if($posts->count())
              @foreach ($posts as $post)
                <div class="col">
                <!-- Blog post-->
                <div class="card border-0 overflow-hidden rounded-4 mb-4 h-100 shadow">
                  <a href="{{ route('article', ['id'=> $post->id]) }}">
                  <img
                  class="card-img-top"
                  src="{{$post->image}}"
                  alt="..." height="250px"
                  />
                  </a>
                  <div class="card-body d-flex flex-column ">
                  <div class="d-flex justify-content-between w-100">
                  <div class="small text-muted">{{$post->created_at->format('F d, Y')}}</div>
                  <span class="text-warning fs-6">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star ps-1"></i>
                    <i class="fa-solid fa-star ps-1"></i>
                    <i class="fa-solid fa-star ps-1"></i>
                    <i class="fa-regular fa-star ps-1"></i>
                  </span>
                  </div>
                  <h2 class="card-title text-start fs-4 py-2 ">{{ $post->title }}</h2>
                  <p class="card-text post-content text-start">
                  {{ old('description', $post->description ?? '') }}
                  </p>
                  <div class="group-btn-card d-flex justify-content-between w-100 mt-auto">
                  <a class="btn btn-learn-now bg-background text-light rounded-4" href="">Learn now</a>
                  <a class="btn text-success" href="{{ route('article', ['id'=> $post->id]) }}">Read more →</a>
                  </div>
                  </div>
                </div>
                </div>
              @endforeach
            @else
              <h1>Post Not Found...!</h1>
            @endif
            </div>
            <!-- Modern Minimal Pagination -->
            @if ($posts->hasPages())
              <nav aria-label="Page navigation" class="mt-5">
              <ul class="pagination justify-content-center align-items-center gap-2">
                {{-- Previous Page Link --}}
                <li class="page-item {{ $posts->onFirstPage() ? 'disabled' : '' }}">
                <a class="page-link border-0 bg-white text-success shadow-sm rounded-3 d-flex align-items-center justify-content-center"
                   style="width:40px;height:40px;"
                   href="{{ $posts->previousPageUrl() ?? '#' }}"
                   tabindex="-1"
                   aria-disabled="{{ $posts->onFirstPage() ? 'true' : 'false' }}">
                  <i class="fa fa-angle-left"></i>
                </a>
                </li>

                {{-- Pagination Elements --}}
                @foreach ($posts->links()->elements[0] as $page => $url)
                @if ($page == $posts->currentPage())
                  <li class="page-item active" aria-current="page">
                  <span class="page-link border-0 bg-success text-white shadow-sm rounded-3 fw-semibold d-flex align-items-center justify-content-center"
                      style="width:40px;height:40px;">
                    {{ $page }}
                  </span>
                  </li>
                @else
                  <li class="page-item">
                  <a class="page-link border-0 bg-white text-success shadow-sm rounded-3 d-flex align-items-center justify-content-center"
                     style="width:40px;height:40px;"
                     href="{{ $url }}">
                    {{ $page }}
                  </a>
                  </li>
                @endif
                @endforeach

                {{-- Next Page Link --}}
                <li class="page-item  {{ $posts->hasMorePages() ? '' : 'disabled' }}">
                <a class="page-link border-0 bg-white text-success shadow-sm rounded-3 d-flex align-items-center justify-content-center"
                   style="width:40px;height:40px;"
                   href="{{ $posts->nextPageUrl() ?? '#' }}"
                   aria-disabled="{{ $posts->hasMorePages() ? 'false' : 'true' }}">
                  <i class="fa fa-angle-right"></i>
                </a>
                </li>
              </ul>
              </nav>
            @endif

        </div>



      </div>
    </div>
@endsection