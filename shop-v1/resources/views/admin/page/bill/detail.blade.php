@extends('admin.layouts.app')

@section('content')

<div class="content-wrapper" style="min-height: 1203.6px;">

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Bill Detail</h1>
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
          <div class="table-responsive">
            <table class="table table-striped text-center">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Product name</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Price</th>
                </tr>
              </thead>
              @if($bills->isNotEmpty())
              <tbody>
                @foreach($bills as $key => $value)
                <tr>
                  <th scope="row">{{ $bills->firstItem() + $key }}</th>
                  <td>{{ $value->product->name }}</td>
                  <td>{{ $value->quantity }}</td>
                  <td>{{ number_format($value->unit_price ) }}<small> VND</small></td>
                </tr>
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