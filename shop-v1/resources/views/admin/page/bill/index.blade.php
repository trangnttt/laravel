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
          <h1>Bill</h1>
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
                  <th scope="col">Customer name</th>
                  <th scope="col">Order Date</th>
                  <th scope="col">Total</th>
                  <th scope="col">Payment</th>
                  <th scope="col">View</th>
                  <th scope="col">Delete</th>
                </tr>
              </thead>
              @if($bills->isNotEmpty())
              <tbody>
                @foreach($bills as $key => $value)
                <tr>
                  <th scope="row">{{ $bills->firstItem() + $key }}</th>
                  <td>{{ $value->customer->name }}</td>
                  <td>{{ $value->date_order }}</td>
                  <td>{{ number_format($value->total ) }}<small> VND</small></td>
                  <td>{{ $value->payment }}</td>
                  <td style="text-align: center;">
                    <a class="btn btn-info btn-sm" href="{{ URL('admin/bill/detail/' . $value->id) }}">
                      <i class="far fa-eye"></i>
                    </a>
                  </td>
                  <td style="text-align: center;">
                    <a class="btn btn-danger btn-sm" href="#" data-toggle="modal"
                      data-target="#modal-default{{ $value->id }}">
                      <i class="fas fa-trash"></i>
                    </a>
                  </td>
                </tr>
                <div class="modal fade show" id="modal-default{{ $value->id }}" style="padding-right: 17px;"
                  aria-modal="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header" style="background: #f1c4c4; color: #ad2e2e;">
                        <h4 class="modal-title">DETELE</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <p class="text-center" style="color: #ad2e2e;">Are you sure to delete bill
                          "<strong>{{ $value->customer->name }}</strong>" </p>
                      </div>
                      <div class="modal-footer justify-content-between">
                        <div style="margin:auto">
                          <a href="#" class="btn btn-success" data-dismiss="modal">Cancel</a>
                          <a href="{{ URL('admin/bill/delete/' . $value->id) }}"
                            class="btn btn-primary btn-danger">Yes,
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
                  <td colspan="5">No data found</td>
                </tr>
              </tbody>
              @endif
            </table>
            <!-- {{-- Pagination --}} -->
            <div class="d-flex justify-content-center">
              {!! $bills->links('pagination::bootstrap-4') !!}
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