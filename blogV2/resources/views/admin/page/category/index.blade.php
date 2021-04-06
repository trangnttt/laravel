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
          <h1>List Category</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">List Category</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <section>
    <div class="col-12">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3>Categories</h3>
            </div>
            <div class="card-body">
              <ul class="list-group">
                @foreach ($categories as $category)
                <li class="list-group-item">
                  <div class="d-flex justify-content-between">
                    {{ $category->name }}

                    <div class="button-group d-flex">
                      <button type="button" class="btn btn-sm btn-primary mr-1 edit-category" data-toggle="modal"
                        data-target="#editCategoryModal" data-id="{{ $category->id }}"
                        data-name="{{ $category->name }}">Edit</button>

                      <form action="" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                      </form>
                    </div>
                  </div>

                  @if ($category->children)
                  <ul class="list-group mt-2">
                    @foreach ($category->children as $child)
                    <li class="list-group-item">
                      <div class="d-flex justify-content-between">
                        {{ $child->name }}

                        <div class="button-group d-flex">
                          <button type="button" class="btn btn-sm btn-primary mr-1 edit-category" data-toggle="modal"
                            data-target="#editCategoryModal" data-id="{{ $child->id }}"
                            data-name="{{ $child->name }}">Edit</button>

                          <form action="" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                          </form>
                        </div>
                      </div>
                    </li>
                    @endforeach
                  </ul>
                  @endif
                </li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>


      </div>
    </div>
</div>
</section>
</div>


@endsection