@extends('layouts.login_main')

@section('content')
    <div class="content d-flex justify-content-center align-items-center">

        <!-- Registration form -->
        <form class="login-form" method="POST" action="{{ route('password.request') }}" aria-label="{{ __('Reset Password') }}">
            @csrf
            <div class="card mb-0">
                <div class="card-body">
                    <div class="text-center mb-3">
                        <i class="icon-plus3 icon-2x text-success border-success border-3 rounded-round p-3 mb-3 mt-1"></i>
                        <h5 class="mb-0">Input Your New Password</h5>
                        <span class="d-block text-muted">All fields are required</span>
                    </div>

                    <div class="form-group text-center text-muted content-divider">
                        <span class="px-2">Your credentials</span>
                    </div>

                    <div class="form-group form-group-feedback form-group-feedback-left">
                        <input type="hidden" name="token" value="{{ $token }}">
                        <input id="email" type="email" placeholder="Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="form-text text-danger" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                        <div class="form-control-feedback">
                            <i class="icon-user-check text-muted"></i>
                        </div>
                    </div>

                    <div class="form-group form-group-feedback form-group-feedback-left">
                        <input placeholder="Password" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                        @endif
                        <div class="form-control-feedback">
                            <i class="icon-user-lock text-muted"></i>
                        </div>
                    </div>

                    <div class="form-group form-group-feedback form-group-feedback-left">
                        <input placeholder="confirm password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        <div class="form-control-feedback">
                            <i class="icon-user-lock text-muted"></i>
                        </div>
                    </div>

                    <button type="submit" class="btn bg-teal-400 btn-block">Reset Password <i class="icon-circle-right2 ml-2"></i></button>
                </div>
            </div>
        </form>
        <!-- /registration form -->
    </div>
@endsection
