@extends('layouts.app')

@section('title', 'Categories_List')

@section('content')
    <div class="row">
        <div class="d-flex justify-content-between mb-2">
          <h3>Create Category</h3>
          <a class="btn btn-success" href="{{ route('Admin.Category.store') }}" role="button">Back</a>
        </div>
        <!-- Blog entries-->
        <div class="col-lg-12">
          <div class="card p-3">
            <form method="POST" action="{{ route('Admin.Category.store')}}">
              @csrf
              <div class="mb-3">
                <label for="tag" class="form-label">Category</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="tag" name="name"  />
                @error('name')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <button type="submit" class="btn btn-success">Submit</button>
            </form>
          </div>
        </div>
      </div>
@endsection

<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>