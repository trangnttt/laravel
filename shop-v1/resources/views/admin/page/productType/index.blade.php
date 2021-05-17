@extends('admin.layouts.app')

@section('content')

<div class="content-wrapper" style="min-height: 1203.6px;">

  @if (Session::has('message'))
  @component('components.alert')
  @slot('class')
  {{ Session::get('class') }}
  @endslot
  @slot('title')
  {{ Session::get('flag') }}
  @endslot
  @slot('message')
  {{ Session::get('message') }}
  @endslot
  @endcomponent
  @endif

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Product Type</h1>
        </div>
        <div class="col-sm-6">
          @include('admin.partial.breadcrumb')
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
              <h3 class="card-title">Product Type</h3>
            </div>
            <div class="card-body">
              <ul class="list-group">
                @foreach ($productType as $type)
                <li class="list-group-item">
                  <div class="d-flex justify-content-between">
                    {{ $type->name }}
                    <div class="button-group d-flex">
                      <a class="btn btn-primary text-white btn-sm mr-1 edit-category" data-toggle="modal" data-target="#editCategoryModal" data-id="{{ $type->id }}" data-name="{{ $type->name }}">
                        Edit
                      </a>
                      <a class="btn btn-danger text-white btn-sm delete-category" data-toggle="modal" data-target="#deleteCategoryModal" data-id="{{ $type->id }}" data-name="{{ $type->name }}">
                        Delete
                      </a>
                    </div>
                  </div>
                  @include('admin.page.productType.edit')
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
              <form action="{{ route('admin.product-type.add') }}" method="POST">
                @csrf
                <div class="form-group">
                  <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Product type name" value="{{ old('name') }}">
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