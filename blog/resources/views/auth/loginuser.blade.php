<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <div class="title-login-form">Đăng nhập</div>
      </div>
      <div class="modal-body">
        <div class="login-form">
          <form method="POST" action="{{ route('login') }}">
            @csrf
            <label>Tên đăng nhập *</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
              value="{{ old('email') }}" required autocomplete="email" autofocus>
            <label>Mật khẩu *</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
              name="password" required autocomplete="current-password">
            <div class="checkbox checkbox-primary">
              <input class="form-check-input" type="checkbox" name="remember" id="remember"
                {{ old('remember') ? 'checked' : '' }}>

              <label class="form-check-label" for="remember">
                {{ __('Remember Me') }}
              </label>
            </div>
            <div class="text-center">
              <button type="submit" name="signin" value="Login" id="login-form">Đăng nhập</button>
              <button class="form-cancel" type="submit" value="">Hủy</button>
            </div>
            <label class="lost-password">
              @if (Route::has('password.request'))
              <a href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
              </a>
              @endif
            </label>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>