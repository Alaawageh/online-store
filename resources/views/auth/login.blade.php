@extends('layouts.app1')
@section('title','Login')
@section('content')
<div class="content-body">
  <section class="row flexbox-container">
      <div class="col-xl-8 col-11 d-flex justify-content-center">
          <div class="card bg-authentication rounded-0 mb-0">
              <div class="row m-0">
                  <div class="col-lg-6 d-lg-block d-none text-center align-self-center px-1 py-0">
                      <img src="{{asset('/app-assets/images/pages/register.jpg')}}" alt="branding logo">
                  </div>
                  <div class="col-lg-6 col-12 p-0">
                      <div class="card rounded-0 mb-0 px-2">
                          <div class="card-header pb-1">
                              <div class="card-title">
                                  <h4 class="mb-0">Login</h4>
                              </div>
                          </div>
                          <p class="px-2">Welcome back, please login to your account.</p>
                          <div class="card-content">
                              <div class="card-body pt-1">
                                <form method="POST" action="{{ route('login') }}">
                                  @csrf
                                      <fieldset class="form-label-group form-group position-relative has-icon-left">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        <div class="form-control-position">
                                              <i class="feather icon-mail"></i>
                                          </div>
                                          <label for="user-name">Email</label>
                                      </fieldset>

                                      <fieldset class="form-label-group position-relative has-icon-left">
                                          <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="user-password" placeholder="Password" required>
                                          <div class="form-control-position">
                                              <i class="feather icon-lock"></i>
                                          </div>
                                          <label for="user-password">Password</label>
                                          @error('password')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                          @enderror
                                      </fieldset>
                                      <div class="form-group d-flex justify-content-between align-items-center">
                                          
                                          <div class="text-right"><a href="{{ route('password.request') }}" class="card-link">Forgot Password?</a></div>
                                      </div>
                                      {{-- <a href="{{route('register')}}" class="btn btn-outline-primary float-left btn-inline">Register</a> --}}
                                      <button type="submit" class="btn btn-primary float-left btn-inline">Login</button>
                                  </form>
                              </div>
                          </div>
                          <div>
                            <br>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>

</div>
@endsection
