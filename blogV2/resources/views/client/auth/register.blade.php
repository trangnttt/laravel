<div class="modal fade" id="signup" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <div class="title-login-form">Register</div>
      </div>
      <div class="modal-body">
        <div class="login-form">
          <form id="form-signup" method="POST" action="{{ route('register') }}">
            @csrf
            <input type="hidden" name="token" value="">
            <label>Username *</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
              value="{{ old('name') }}" required autocomplete="name" autofocus>
            <label>Email *</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
              value="{{ old('email') }}" required autocomplete="email">
            <label>Password *</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
              name="password" required autocomplete="new-password">
              <label>Confirm Password *</label>
              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

            <div class="text-center">
              <button type="submit" value="Login" name="signup" id="signup-form">Register</button>
              <button class="form-cancel" type="submit" value="">Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@push('scripts')
<script>
  $(document).ready(function() {
    $("#signup-form").click(function(event) {
      event.preventDefault();
      var name = $('#form-signup input[name="name"]').val();
      var email = $('#form-signup input[name="email"]').val();
      var password = $('#form-signup input[name="password"]').val();
      var password_confirmation = $('#form-signup input[name="password_confirmation"]').val();

      $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').val()
            }
        });
      $.ajax({
        type: 'post',
        url: './register',
        data: {
          'name': name,
          'email': email,
          'password': password,
          'password_confirmation' : password_confirmation,
        },
        dataType: 'json',
        success: function(data) {
          console.log('success');
          $('#signup').modal('hide');
          window.location.href = '/';
        },
        error: function(data) {
          $('#form-signup input[name="name"]').addClass('is-invalid');
          $('input[name="email"]').addClass('is-invalid');
          $('#form-signup input[name="password"]').addClass('is-invalid');
          $('#form-signup input[name="password_confirmation"]').addClass('is-invalid');
          $('#form-signup input[name="password_confirmation"]').after('<span class="invalid-feedback " role="alert"><strong>Check email or password, please !!!</strong></span>');
        }
      });
    });
  });
  </script>
@endpush