@extends('layouts.app')

@section('title', 'Tag_List')

@section('content')
    <div class="row">
        <div class="d-flex justify-content-between mb-2">
          <h3>Create Tag</h3>
          <a class="btn btn-success" href="{{ route('Admin.tag.store') }}" role="button">Back</a>
        </div>
        <!-- Blog entries-->
        <div class="col-lg-12">
          <div class="card p-3">
            <form method="POST" action="{{ route('Admin.tag.store')}}">
              @csrf
              <div class="mb-3">
                <label for="tag" class="form-label">tag</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror"  id="tag" name="name"  />
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