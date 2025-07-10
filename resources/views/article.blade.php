@extends('layouts.app')


@section('title', 'Blog Title')

@section('content')
      <div class="container mt-5">
      <div class="row">
        <div class="col-lg-12">
          <!-- Post content-->
          <article>
            <!-- Post header-->
            <header class="mb-4">
              <!-- Post title-->
              <h1 class="fw-bolder mb-1">{{$post->title}}</h1>
              <!-- Post meta content-->
              <div class="text-muted fst-italic mb-2">
                {{ $post->created_at->format('F j, Y') }} by {{ $post->user?->name }}
              </div>
              <!-- Post categories-->

              @foreach ($post->tags as $tag )
                                <a
                class="badge bg-secondary text-decoration-none link-light"
                href="#!"
                >{{$tag->name}}</a
                >
              @endforeach
            </header>
            <!-- Preview image figure-->
            <figure class="mb-5 d-flex">
              <img
                width="500"
                class="img-fluid rounded m-auto"
                src="{{$post->image}}"
                alt="..."
              />
            </figure>
            <section>
              {{$post->description}}
            </section>
            <!-- Post content-->
            <section class="mb-5">
              {!! $post->content !!}
            </section>
          </article>
        </div>
        <!-- Side widgets-->
        {{-- <div class="col-lg-4">
          <!-- Search widget-->
            @include('components.serchForm')
          <!-- Tags widget-->
            @include('components.tag')
        </div> --}}
      </div>
    </div>
@endsection