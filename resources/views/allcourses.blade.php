<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>All Courses</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Edu+SA+Hand:wght@400..700&display=swap" rel="stylesheet">
  <style>
      
      *{
        padding: 0%;
        margin: 0%;
        box-sizing: border-box
      }
      body{
        font-family: 'Open Sans', sans-serif;
      }
      :root{
        --primary-color:#20B486;
        --secondary-color:#FF9B26;
        --description-color:#646464;
      }
      .text-active{
        color: var(--primary-color);
      }
      .text-description{
        color: var(--description-color);
      }
      .bg-primary-background{
        background-color: #ECFDF5;
      }
      .bg-background{
        background-color: var(--primary-color);
      }
      .bg-card{
        background-color: #ECFDF5;
      }
      h1{
        font-size: 50px;
      }
      .post-content{
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 2; /* Number of lines to show */
                line-clamp: 2;
        -webkit-box-orient: vertical;
      }
      .btn-login, .btn-logout{
          border: 2px solid #fff;
          border-radius: 10px;
          background-color:var(--primary-color);
      }
      .btn-logout:hover{
        border: 2px solid #fff;
        background-color: var(--primary-color);
      }

    /* search */
    #button-search:hover{
      background-color: rgba(32, 180, 134 , 0.8)
    }

    /* dropdown */
 </style>
</head>
<body>

@extends('layouts.app')

@section('title', 'Home')

@section('content')
  
    <div class="container mt-5">
      <div class="row">
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

</body>
</html>