@extends('layouts.app')

@section('title', 'Home')

@section('content')


    @include('components.banner')

    <div class="container py-4 border shadow-xl mt-5">
      <div class="d-flex flex-wrap justify-content-between align-items-center">
        <img src="{{ asset('storage/uploads/logo_image/vs_code.png') }}" alt="Duolingo" height="100">
        <img src="{{ asset('storage/uploads/logo_image/github.png') }}" alt="Codecov" height="80">
        <img src="{{ asset('storage/uploads/logo_image/stackoverflow.png') }}" alt="UserTesting" height="100">
        <img src="{{ asset('storage/uploads/logo_image/freeCodeCamp.png') }}" alt="Magic Leap" height="50">
        <img src="{{ asset('storage/uploads/logo_image/w3school.png') }}" alt="Magic Leap" height="60">
        <img src="{{ asset('storage/uploads/logo_image/mdn.png') }}" alt="Magic Leap" height="100">
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
          <div class="row">
            @if($posts->count())
              @foreach ($posts as $post)
                <div class="col-lg-4">
                <!-- Blog post-->
                  <div class="card mb-4">
                    <a href="{{ route('article', ['id'=> $post->id]) }}"
                      ><img
                        class="card-img-top"
                        src="{{$post->image}}"
                        alt="..." height="250px"
                    /></a>
                    <div class="card-body">
                      <div class="small text-muted">{{$post->created_at->format('F d, Y')}}</div>
                      <h2 class="card-title h4">{{ $post->title }}</h2>
                      <p class="card-text post-content">
                        {{$post->content}}
                      </p>
                      <a class="btn btn-primary" href="{{ route('article', ['id'=> $post->id]) }}">Read more →</a>
                    </div>
                  </div>
                </div>
              @endforeach
                
            @else
                <h1>Post Not Found...!</h1>
            @endif


          </div>
          <!-- Pagination-->
          <div class="d-flex justify-content-center">
            {{ $posts->links('pagination::bootstrap-5') }}
          </div>

        </div>



      </div>
    </div>
@endsection