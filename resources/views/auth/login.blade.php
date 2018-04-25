@extends('layouts.app')

@section('content')
<div class="container limiter">
    <div class="row container-login">
        <div class="col-md-8 col-md-offset-2 wrap-login">

            <div class="panel panel-default p-container">
                <div class="login100-form-title">
                    <span class="login100-form-title">
                        Login
                    </span>
                </div>
                
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="wrap-input100 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">
                                <span class="label-input100">E-mail Address</span>
                            </label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control form-box" name="email" value="{{ old('email') }}" placeholder="Enter e-mail">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="wrap-input100 form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label"><span class="label-input100">Password</span></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control form-box" name="password" placeholder="Enter password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4 flex-sb-m">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                                
                                <div>
                                    <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Password?</a>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary btn-new">
                                    <i class="fa fa-btn fa-sign-in"></i> Login
                                </button>

                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="login-img" style="background-image: url('images/03.jpg');">
                <div class="img">
                    <div class="img__text">
                        <h2>New here?</h2>
                        <p>Sign up and discover a great amount of new opportunities!</p>
                    </div>
                    <a class="lala" href="{{ url('/register') }}">
                        <div class="img__btn">
                            <span class="">Sign Up</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection