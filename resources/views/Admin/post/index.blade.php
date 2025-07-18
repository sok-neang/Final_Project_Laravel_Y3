@extends('layouts.app')

@section('title', 'Post Create')

@section('content')
      <div class="row mx-5">
        <div class="d-flex justify-content-between mb-2 ">
            <h3>Post List</h3>
            <a class="btn btn-success" href="{{ route('Admin.post.create') }}" role="button"
              >Create</a
            >
        </div>
                <!-- Blog entries-->
        <div class="col-lg-12">
          <div class="card p-3">
            <table
              id="datatable"
              class="table table-striped"
              style="width: 100%"
            >
              <thead>
                <tr>
                  <th>No</th>
                  <th>Thumbnail</th>
                  <th>Title</th>
                  <th>Category</th>
                  <th>Tag</th>
                  <th>Author</th>
                  <th style="width: 100px">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($posts as $post)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}" width="100"></td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->category->name }}</td>
                    <td>
                      <ul>
                        @foreach ($post->tags as $tag)
                          <li>{{ $tag->name }}</li>
                        @endforeach
                      </ul>
                    </td>
                    <td>{{ $post->user?->email }}</td>
                    <td>
                      <a
                        class="btn btn-outline-success btn-sm"
                        href="{{ route('Admin.post.edit', ['id' => $post->id]) }}"
                        role="button"
                        >Edit</a
                      >
                    </td>
                  </tr>
                @endforeach
                
              </tbody>
              <tfoot>
                <tr>
                  <th>No</th>
                  <th>Thumbnail</th>
                  <th>Title</th>
                  <th>Category</th>
                  <th>Tag</th>
                  <th style="width: 100px">Action</th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
@endsection