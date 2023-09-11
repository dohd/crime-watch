@extends('layouts.auth')
@section('title', 'CRIMEWATCH-LOGIN')

@section('content')

<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <div class="auth-wrapper auth-cover">
                <div class="auth-inner row m-0">
                   
                    <!-- /Brand logo-->
                    <!-- Left Text-->
                    <div class="d-none d-lg-flex col-lg-8 align-items-center p-5 login-body ">
                        <!--<div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img class="img-fluid" src="{{asset('app-assets/images/pages/login-v2.svg')}}" alt="Login V2" /></div>-->
                    </div>
                    <!-- /Left Text-->
                    <!-- Login-->
                    <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                        <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                            <h3 class="card-title fw-bold mb-1">CRIME WATCH</h3>
                            <p class="card-text mb-2">Please sign-in to your account</p>
                            <form class="auth-login-form mt-2"  method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="mb-1">
                                    <label class="form-label" for="login-email">Email Or Username</label>
                                    <input class="form-control  {{ $errors->has('username') || $errors->has('email') ? ' is-invalid' : '' }}" name="login" value="{{ old('username') ?: old('email') }}"  id="login-email" type="text" name="login-email" placeholder="john@technoguru" aria-describedby="login-email" autofocus="" tabindex="1" required  />
                                    @if ($errors->has('username') || $errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('username') ?: $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                </div>
                                <div class="mb-1">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label" for="login-password">Password</label><a href="auth-forgot-password-cover.html"><small>Forgot Password?</small></a>
                                    </div>
                                    <div class="input-group input-group-merge form-password-toggle">
                                        <input class="form-control form-control-merge @error('password') is-invalid @enderror " id="login-password" type="password" name="password" placeholder="············" aria-describedby="login-password" tabindex="2" /><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                        @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" id="remember-me" type="checkbox" tabindex="3" />
                                        <label class="form-check-label" for="remember-me"> Remember Me</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary w-100" tabindex="4">Sign in</button>
                            </form>
                           
                          
                        </div>
                    </div>
                    <!-- /Login-->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END: Content-->
@endsection
