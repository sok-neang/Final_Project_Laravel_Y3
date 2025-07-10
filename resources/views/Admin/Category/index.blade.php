@extends('layouts.app')

@section('title', 'Categories_List')

@section('content')
          <div class="row mx-5">
        <div class="d-flex justify-content-between mb-2">
          <h3>Category List</h3>
          <a class="btn btn-success" href="{{ route('Admin.Category.create') }}" role="button"
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
                  <th>Category</th>
                  <th style="width: 100px">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($categories as $category) 
                <tr>
                  <td>{{ $loop->iteration }}</td> {{-- /*interation->oy index jab pi 1 tv*/ --}}
                  <td>{{ $category->name }}</td>
                  <td class="d-flex justify-content-between">
                    <a
                      class="btn btn-outline-success btn-sm mx-3"
                      href="{{ route('Admin.Category.edit', ['id' => $category->id]) }}"
                      role="button"
                      >Edit</a
                    >
                    <form method="POST" action="{{route('Admin.Category.delete', ['id' => $category->id])}}">
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
                  <th>Category</th>
                  <th>Action</th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
@endsection