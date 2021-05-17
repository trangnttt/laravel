@extends('client.layouts.app')

@section('content')

<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Sign up</h6>
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
        <form action="{{ route('client.signup') }}" method="post" class="beta-form-checkout">
            @csrf
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <h4>Sign up</h4>
                    <div class="space20">&nbsp;</div>

                    <div class="form-block">
                        <label for="email">Email address*</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                        @error('email')
                        <span class="is-error">{{ $errors->first('email') }}</span>
                        @enderror
                    </div>

                    <div class="form-block">
                        <label for="your_last_name">Fullname*</label>
                        <input type="text" class="form-control @error('full_name') is-invalid @enderror" name="full_name" value="{{ old('full_name') }}">
                        @error('full_name')
                        <span class="is-error">{{ $errors->first('full_name') }}</span>
                        @enderror
                    </div>

                    <div class="form-block">
                        <label for="adress">Address*</label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}">
                        @error('address')
                        <span class="is-error">{{ $errors->first('address') }}</span>
                        @enderror
                    </div>


                    <div class="form-block">
                        <label for="phone">Phone*</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}">
                        @error('phone')
                        <span class="is-error">{{ $errors->first('phone') }}</span>
                        @enderror
                    </div>
                    <div class="form-block">
                        <label for="password">Password*</label>
                        <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" value="{{ old('password') }}">
                        @error('password')
                        <span class="is-error">{{ $errors->first('password') }}</span>
                        @enderror
                    </div>
                    <div class="form-block">
                        <label for="re_password">Re password*</label>
                        <input class="form-control @error('re_password') is-invalid @enderror" type="password" name="re_password" value="{{ old('re_password') }}">
                        @error('re_password')
                        <span class="is-error">{{ $errors->first('re_password') }}</span>
                        @enderror
                    </div>
                    <div class="form-block">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </form>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection