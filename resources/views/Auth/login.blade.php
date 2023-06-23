
@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('login.custom') }}">
                        @csrf

    <div class="container-fluid bg-login">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12 login-card">
                    <div class="row">
                        <div class="col-md-5 detail-part">
                             <div class="logo-cover">
                             <img src="images/logo.jpg" alt="">
                             </div>
                            <h1>Bontoc Municipal Waterworks System Administration</h1>
                            <br>
                            <p><img src="icon/c-circle.svg" alt="Bootstrap" width="20" height="20">    2023</p>
                        </div>

                        <div class="col-md-7 logn-part">
                          <div class="row">
                              <div class="col-lg-10 col-md-12 mx-auto">
                                    <div class="form-cover">
                                        <h6>Login Here</h6>
                                         <div class="form-group row">
                                                <div class="col-md-12">
                                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }} " placeholder="Enter Username" required autofocus>

                                                    @if ($errors->has('email'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                         
                                            <div class="form-group row">

                                                <div class="col-md-12">
                                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Enter Password" required>

                                                    @if ($errors->has('password'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                         <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                         <div class="row form-footer">
                                            <a class="btn btn-link">
                                    {{ __('Forgot Your Password?') }}
                                            </a>
                                             <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                                         </div>
                                    </div>
                              </div>
                          </div>
                           
                           
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </form>  
@endsection