@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper" style="min-height: 1244.06px;">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Customer Detail</h1>
        </div>
        <div class="col-sm-6">
          @include('admin.partial.breadcrumb')
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <section class="content">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-warning">
        <div class="card-header">
          <h3 class="card-title">Customer: <strong>{{ $customers->name }}</strong></h3>
        </div>
        <form method="POST" action="{{ URL('admin/customer/edit/' . $customers->id) }}">
          @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Name</label>
              <input type="name" class="form-control" name="name" value="{{ $customers->name }}">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Email</label>
              <input type="email" class="form-control" name="email" value="{{ $customers->email }}">
            </div>
            <div class="form-group">
              <label>Gender </label> <br>
              @if(($customers->gender) == "male")
              <input type="radio" class="input-radio" name="gender" value="male" checked="checked"style="width: 2%"><span style="margin-right: 2%">Male</span>
              <input type="radio" class="input-radio" name="gender" value="female" style="width: 2%"><span>Female</span>
              @else
              <input type="radio" class="input-radio" name="gender" value="male" style="width: 2%"><span style="margin-right: 2%">Male</span>
              <input type="radio" class="input-radio" name="gender" value="female" checked="checked" style="width: 2%"><span>Female</span>
              @endif
            </div>
            <div class="form-group">
              <label for="">Address</label>
              <input type="text" class="form-control" name="address" value="{{ $customers->address }}">
            </div>
            <div class="form-group">
              <label for="">Phone</label>
              <input type="tel" class="form-control" maxlength="10" name="phone_number" value="{{ $customers->phone_number }}">
            </div>
            <div class="form-group">
              <label for="">Note</label>
              <textarea name="note" class="form-control" cols="30" rows="5">{{ $customers->note }}</textarea>
            </div>

          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
      </div>
  </section>
</div>

@endsection