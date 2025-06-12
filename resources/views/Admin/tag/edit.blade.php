@extends('layouts.app')

@section('title', 'Categories_List')

@section('content')
    <div class="row">
        <div class="d-flex justify-content-between mb-2">
          <h3>Edit Category</h3>
          <a class="btn btn-success" href="{{ route('Admin.Category.index') }}" role="button">Back</a>
        </div>
        <!-- Blog entries-->
        <div class="col-lg-12">
          <div class="card p-3">
            <form method="POST" action="{{ route('Admin.tag.update', ['id' => $tag->id]) }}">
              @method('PUT')
              @csrf
              <div class="mb-3">
                <label for="name" class="form-label">Tag</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $tag->name }}" />
                @error('name')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
@endsection