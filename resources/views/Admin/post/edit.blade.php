@extends('layouts.app')

@section('title', 'Update Post')

@section('content')
    <div class="row mx-5">
        <div class="d-flex justify-content-between mb-2">
          <h3>Update Post</h3>
          <a class="btn btn-success" href="{{ route('Admin.post.index') }}" role="button">Back</a>
        </div>
        <!-- Blog entries-->
        <div class="col-lg-12">
          <div class="card p-3">
            <form method="POST" action="{{ route('Admin.post.update', ['id' => $post->id]) }}" enctype="multipart/form-data">
              @method('PUT')
              @csrf
              <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input
                  type="text"
                  class="form-control"
                  id="title"
                  name="title"
                  value="{{ $post->title }}"
                />
              </div>

              <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea
                  class="form-control"
                  id="description"
                  name="description"
                  rows="5"
                >{{ $post->description }}</textarea>
              </div>
              
              <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea
                  class="form-control"
                  id="content"
                  name="content"
                  rows="5"
                >{{ $post->content }}</textarea>
              </div>

              <div class="mb-3">
                <label for="thumbnail" class="form-label"
                  >Choose Thumbnail</label
                >
                <input
                  class="form-control"
                  type="file"
                  id="thumbnail"
                  name="thumbnail"
                />
              </div>
              <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select
                  class="form-select"
                  name="category_id"
                  aria-label="Default select example"
                >
                  <option selected>Select Category</option>
                  @foreach($categories as $category)
                    <option value="{{ $category->id }}"{{ $category->id == $post->category_id ? ' selected' : '' }}>{{ $category->name }}</option>
                  @endforeach

                </select>
              </div>
              <div class="mb-3">
                <label for="tags" class="form-label">Tag</label>
                <div class="tag-wrapper">
                  @foreach($tags as $tag)
                    <div class="form-check form-check-inline">
                      <input
                        class="form-check-input"
                        type="checkbox"
                        name="tags[]"
                        value="{{ $tag->id }}"
                        id="tag{{ $tag->id }}"
                        {{ in_array($tag->id, $post->tags()->pluck('id')->toArray()) ? ' checked' : '' }}
                      />
                      <label class="form-check-label" for="tag{{ $tag->id }}">{{ $tag->name }}</label>
                    </div>
                  @endforeach
                </div>
              </div>
              <button type="submit" class="btn btn-success">Submit</button>
            </form>
          </div>

          @if($errors->any())
            <div>
              <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
        </div>
      </div>
@endsection

<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>