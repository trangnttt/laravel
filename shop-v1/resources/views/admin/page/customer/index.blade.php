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
          <h1>Customers</h1>
        </div>
        <div class="col-sm-6">
          @include('admin.partial.breadcrumb')
        </div>
      </div>
    </div>
  </section>
  <section>
    <div class="col-12">
      <div class="card card-primary">
        <!-- /.card-header -->
        <div class="card-body p-0">
          <!-- search -->
          @include('admin.page.search')
          <div class="table-responsive">
            <table class="table table-striped text-center">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Gender</th>
                  <th scope="col">Address</th>
                  <th scope="col">Phone</th>
                  <th scope="col">Note</th>
                  <th scope="col">Edit</th>
                  <th scope="col">Delete</th>

                </tr>
              </thead>
              @if($customers->isNotEmpty())
              <tbody>
                @foreach($customers as $key => $value)
                <tr>
                  <th scope="row">{{ $customers->firstItem() + $key }}</th>
                  <td>{{ $value->name }}</td>
                  <td>{{ $value->email }}</td>
                  <td>{{ $value->gender }}</td>
                  <td>{{ $value->address }}</td>
                  <td>{{ $value->phone_number }}</td>
                  <td>{{ $value->note }}</td>
                  <td style="text-align: center;">
                    <a class="btn btn-info btn-sm" href="{{ URL('admin/customer/edit/' . $value->id) }}">
                      <i class="fas fa-pencil-alt"></i>
                    </a>
                  </td>
                  <td style="text-align: center;">
                    <a class="btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#modal-default{{ $value->id }}">
                      <i class="fas fa-trash"></i>
                    </a>
                  </td>
                </tr>
                <div class="modal fade show" id="modal-default{{ $value->id }}" style="padding-right: 17px;" aria-modal="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header" style="background: #f1c4c4; color: #ad2e2e;">
                        <h4 class="modal-title">DETELE</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <p class="text-center" style="color: #ad2e2e;">Are you sure to delete member
                          "<strong>{{ $value->name }}</strong>" </p>
                      </div>
                      <div class="modal-footer justify-content-between">
                        <div style="margin:auto">
                          <a href="#" class="btn btn-success" data-dismiss="modal">Cancel</a>
                          <a href="{{ URL('admin/customer/delete/' . $value->id) }}" class="btn btn-primary btn-danger">Yes,
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
              {!! $customers->links('pagination::bootstrap-4') !!}
            </div>
          </div>
          <!-- /.modal-dialog -->
        </div>
      </div>
    </div>
    <!-- /.card-body -->
  </section>
</div>

@endsection