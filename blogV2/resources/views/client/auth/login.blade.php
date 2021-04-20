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
            <label>Email *</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
              value="{{ old('email') }}" required autocomplete="email" autofocus>
            <label>Password *</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror"
              name="password" required autocomplete="current-password">
            <div class="checkbox checkbox-primary">
              <input class="form-check-input" type="checkbox" name="remember" id="remember"
                {{ old('remember') ? 'checked' : '' }}>

              <label class="form-check-label" for="remember">
                {{ __('Remember Me') }}
              </label>
            </div>
            <div class="text-center">
              <button type="submit" name="signin" value="Login" id="login-form">Login</button>
              <button class="form-cancel" type="submit" value="">Cancel</button>
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

@push('scripts')
<script>
  $(document).ready(function() {
    $("#login-form").click(function(event) {
      event.preventDefault();
      var email = $("#email").val();
      var password = $("#password").val();
      $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').val()
            }
        });
      $.ajax({
        type: 'post',
        url: './login',
        data: {
          'email': email,
          'password': password
        },
        dataType: 'json',
        success: function(data) {
          console.log('success');
          $('#myModal').modal('hide');
          window.location.href = '/';
        },
        error: function(data) {
          $('input[name="email"]').addClass('is-invalid');
          $('input[name="password"]').addClass('is-invalid');
          $('input[name="password"]').after('<span class="invalid-feedback " role="alert"><strong>Check email or password, please !!!</strong></span>');
        }
      });
    });
  });
  </script>
@endpush

