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
          <h1>Products</h1>
        </div>
        <div class="col-sm-6">
          @include('admin.partial.breadcrumb')
        </div>
      </div>
      <a href="{{ route('admin.product.add') }}" class="btn btn-primary">Add product</a>
    </div>
  </section>
  <section>
    <div class="col-12">
      <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
          <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
              <div class="col-sm-12 col-md-6"></div>
              <div class="col-sm-12 col-md-6"></div>
            </div>
            <div class="row">
              <!-- search -->
              @include('admin.page.search')
              <div class="table-responsive">
                <table class="table table-striped text-center">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Product Type</th>
                      <th scope="col" style="width:30%">Description</th>
                      <th scope="col">Image</th>
                      <th scope="col">Unit Price</th>
                      <th scope="col">Promotion Price</th>
                      <th scope="col">Unit</th>
                      <th scope="col">New</th>
                      <th scope="col">Edit</th>
                      <th scope="col">Delete</th>
                    </tr>
                  </thead>
                  @if($products->isNotEmpty())
                  <tbody>
                    @foreach ($products as $key => $value)
                    <tr>
                      <th scope="row">{{ $products->firstItem() + $key}}</th>
                      <td>
                        <a href="{{ route('admin.product.edit', [$value->id]) }}">
                          {{ $value->name }}
                        </a>
                      </td>
                      <td>{{ $value->product_type->name }}
                      </td>
                      <td style="text-align: justify;">{{ $value->description}}</td>
                      <td>
                        @if(isset($value->image))
                        <img style="width:100px" src="assets/client/image/product/{{ $value->image }}" />
                        @else
                        <span>No image</span>
                        @endif
                      </td>
                      <td>{{ number_format($value->unit_price) }} <small>VND</small></td>
                      <td>{{ number_format($value->promotion_price) }} <small>VND</small></td>
                      <td>{{ $value->unit }}</td>
                      <td>
                      <label>
                        @if($value->new == 1)
                        <input type="checkbox" value="{{$value->new}}" checked="checked">
                        @else
                        <input type="checkbox" value="{{$value->new}}">
                        @endif
                      </label>
                      </td>
                      <td style="text-align: center;">
                        <a class="btn btn-info btn-sm" href="{{ route('admin.product.edit', [$value->id]) }}">
                          <i class="fas fa-pencil-alt"></i>
                        </a>
                      </td>
                      <td style="text-align: center;">
                        <a class="btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#modal-delete{{ $value->id }}">
                          <i class="fas fa-trash"></i>
                        </a>
                      </td>
                    </tr>
                    <div class="modal fade show" id="modal-delete{{ $value->id }}" style="padding-right: 17px;" aria-modal="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header" style="background: #f1c4c4; color: #ad2e2e;">
                            <h4 class="modal-title">DETELE</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <p class="text-center" style="color: #ad2e2e;">Are you sure to
                              delete post <br>
                              "<strong>{{ $value->name }}</strong>" </p>
                          </div>
                          <div class="modal-footer justify-content-between">
                            <div style="margin:auto">
                              <a href="#" class="btn btn-success" data-dismiss="modal">Cancel</a>
                              <a href="{{ URL('admin/product/delete/' . $value->id) }}" class="btn btn-primary btn-danger">Yes,
                                delete</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endforeach
                  </tbody>
                  @else
                  <tbody>
                    <tr>
                      <td colspan="9">No data found</td>
                    </tr>
                  </tbody>
                  @endif
                </table>
                <!-- {{-- Pagination --}} -->
                <div class="d-flex justify-content-center">
                  {!! $products->links('pagination::bootstrap-4') !!}
                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- /.card-body -->
      </div>
    </div>
  </section>
</div>

@endsection