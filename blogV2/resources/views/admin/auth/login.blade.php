@extends('admin.layouts.login')

@section('content')
<div class="login-box">
  <div class="login-logo">
    <h3>SIGNIN ADMIN</h3>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      
      <p class="login-box-msg">Sign in to start your session</p>
      <div class="text-center text-danger">
      <span>{{ $errors->first('email') }} <br> {{ $errors->first('password') }}</span>
      </div>
      <form method="POST" action="{{ route('admin.login') }}">
        @csrf
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block" id="login-form">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
    </form>

      <p class="mt-2 mb-0 text-center">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-2 text-center">
        <a href="" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->


@endsection