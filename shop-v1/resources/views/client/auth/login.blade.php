@extends('client.layouts.app')

@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Sign in</h6>
        </div>
        @include('client.partial.breadcrumb')
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">
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
        <form action="{{ route('client.signin') }}" method="post" class="beta-form-checkout">
            @csrf
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <h4>Sign in</h4>
                    <div class="space20">&nbsp;</div>
                    <div class="form-block">
                        <label for="email">Email address*</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                        @error('email')
                        <span class="is-error">{{ $errors->first('email') }}</span>
                        @enderror
                    </div>
                    <div class="form-block">
                        <label for="phone">Password*</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}">
                        @error('password')
                        <span class="is-error">{{ $errors->first('password') }}</span>
                        @enderror
                    </div>
                    <p style="text-align: center;font-size: 13px;color: rgb(13, 92, 182);">No account? <a  style="color: rgb(13, 92, 182);" href="{{route('client.signup')}}">Create account</a></p>

                    <div class="form-block">
                        <button type="submit" class="btn btn-primary">Signin</button>
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </form>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection