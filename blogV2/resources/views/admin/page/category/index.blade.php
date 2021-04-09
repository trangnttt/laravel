@extends('admin.layouts.app')

@section('content')

<div class="content-wrapper" style="min-height: 1203.6px;">

  @if (Session::has('message'))
  @component('components.alert')
  @slot('class')
  success
  @endslot
  @slot('title')
  {{ Session::get('message') }}
  @endslot
  @endcomponent
  @endif

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Category</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Category</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <section>
    <div class="col-12">
      <div class="row">
        <div class="col-xs-12 col-md-7">
          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">Categories List</h3>
            </div>
            <div class="card-body">
              <ul class="list-group">
                @foreach ($categories as $category)
                <li class="list-group-item">
                  <div class="d-flex justify-content-between">
                    {{ $category->name }}

                    <div class="button-group d-flex">
                      <a class="btn btn-primary text-white btn-sm mr-1 edit-category" data-toggle="modal"
                        data-target="#editCategoryModal" data-id="{{ $category->id }}"
                        data-name="{{ $category->name }}">
                        Edit
                      </a>
                      <a class="btn btn-danger text-white btn-sm delete-category" data-toggle="modal"
                        data-target="#deleteCategoryModal" data-id="{{ $category->id }}"
                        data-name="{{ $category->name }}">
                        Delete
                      </a>
                    </div>
                  </div>

                  @if ($category->children)
                  <ul class="list-group mt-2">
                    @foreach ($category->children as $child)
                    <li class="list-group-item">
                      <div class="d-flex justify-content-between">
                        {{ $child->name }}

                        <div class="button-group d-flex">
                          <a class="btn btn-info text-white btn-sm mr-1 edit-category" data-toggle="modal"
                            data-target="#editCategoryModal" data-id="{{ $child->id }}" data-name="{{ $child->name }}">
                            Edit
                          </a>
                          <a class="btn btn-danger text-white btn-sm delete-category" data-toggle="modal"
                            data-target="#deleteCategoryModal" data-id="{{ $child->id }}"
                            data-name="{{ $child->name }}">
                            Delete
                          </a>
                        </div>
                      </div>
                    </li>
                    @include('admin.page.category.edit')
                    @endforeach
                  </ul>
                  @endif
                </li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>

        <div class="col-xs-12 col-md-5">
          <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Create Category</h3>
            </div>
            <div class="card-body">
              <form action="{{ route('admin.category.add') }}" method="POST">
                @csrf
                <div class="form-group">
                  <select class="form-control" name="parent_id">
                    <option value="">Select Parent Category</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    placeholder="Category name" value="{{ old('name') }}">
                  @error('name')
                  <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                  @enderror
                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Create</button>
                </div>
              </form>
            </div>
          </div>

        </div>
      </div>
    </div>
</div>
</section>
</div>


@endsection