@extends('layouts.app')

@section('title', 'Tag_List')

@section('content')
          <div class="row mx-5">
        <div class="d-flex justify-content-between mb-2">
          <h3>tag List</h3>
          <a class="btn btn-success" href="{{ route('Admin.tag.create') }}" role="button"
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
                  <th>tag</th>
                  <th style="width: 100px">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($tags as $tag) 
                <tr>
                  <td>{{ $loop->iteration }}</td> {{-- /*interation->oy index jab pi 1 tv*/ --}}
                  <td>{{ $tag->name }}</td>
                  <td class="d-flex justify-content-between">
                    <a
                      class="btn btn-outline-success btn-sm mx-3"
                      href="{{ route('Admin.tag.edit', ['id' => $tag->id]) }}"
                      role="button"
                      >Edit</a
                    >
                    <form method="POST" action="{{route('Admin.tag.delete', ['id' => $tag->id])}}">
                      @method ('DELETE')
                      @csrf
                      <button
                        class="btn btn-outline-warning btn-sm"
                        role="button"
                        type="submit"
                        >Delete
                      </button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <th>No</th>
                  <th>Tag</th>
                  <th>Action</th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
@endsection