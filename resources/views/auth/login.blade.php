@extends('layouts.app')

@section('content')
    <div class="view-header">
        <div class="header-icon">
            <i class="pe page-header-icon pe-7s-unlock"></i>
        </div>
        <div class="header-title">
            <h3>Login</h3>
            <small>
                Please enter your credentials to login.
            </small>
        </div>
    </div>

    <div class="panel panel-filled">
        <div class="panel-body">
            <form id="loginForm" novalidate role="form" method="POST"
                  action="{{ route('login') }}" autocomplete="off">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="control-label">E-Mail Address</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"
                           required autofocus placeholder="example@gmail.com" title="Please enter you username">
                    @if ($errors->has('email'))
                        <span class="help-block small">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="control-label">Password</label>
                    <input id="password" type="password" class="form-control" name="password" required
                           placeholder="******" value="">
                    @if ($errors->has('password'))
                        <span class="help-block small">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                    @endif
                </div>

                <div>
                    <label>
                        <input type="checkbox"
                               name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                    </label>
                </div>

                <div>
                    <button class="btn btn-accent" type="submit">Login</button>
                </div>
            </form>
        </div>
    </div>

@endsection
