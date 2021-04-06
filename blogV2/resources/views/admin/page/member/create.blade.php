@extends('admin.layouts.app')

@section('content')

<div class="content-wrapper">

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

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Add User</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Add User</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Create user</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form method="POST" action="{{ route('admin.member.add') }}">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                  placeholder="Enter name" value="{{ old('name') }}">
                @error('name')
                <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                  placeholder="Enter email" value="{{ old('email') }}">
                @error('email')
                <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                  placeholder="Password">
                @error('password')
                <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                @enderror
              </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Create</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

@push('scripts')
<script>
$("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
  $("#success-alert").slideUp(500);
});
</script>
@endpush