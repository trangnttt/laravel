@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper" style="min-height: 1244.06px;">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Member Detail</h1>
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
          <h3 class="card-title">Member: <strong>{{ $data->name }}</strong></h3>
        </div>
        <form method="POST" action="{{ URL('admin/member/edit/' . $data->id) }}">
          @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Name</label>
              <input type="name" class="form-control" name="name" value="{{ $data->name }}">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Email</label>
              <input type="email" class="form-control" name="email" value="{{ $data->email }}">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" name="password" value="{{ $data->password }}">
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