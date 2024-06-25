@extends('layouts.dashboard.template')

@section('content')


@include('sweetalert::alert')

<div class="hold-transition login-page">
  
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-success">
      <div class="card-header text-center">
        <a href="" class="h1"><b>e-kelurahan<br>baloi permai</b></a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form action="{{ route('loginproses') }}" method="post">
          @csrf
          <div class="input-group mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- /.col -->
            <div class="col-12">
              <button type="submit" class="btn btn-success btn-block">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <div class="social-auth-links text-center mt-2 mb-3">
          <a href="{{ route('google') }}" class="btn btn-block btn-primary">
            <i class="fab fa-google mr-2"></i> Sign in Google
          </a>
        </div>
        <!-- /.social-auth-links -->

        <p class="mb-1">
          <a href="{{ route('password.request') }}">I forgot my password</a>
        </p>
        <p class="mb-0">
          <a href="{{ route('register') }}" class="text-center">Register a new membership</a>
        </p>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->
</div>

@include('layouts.dashboard.script')


@endsection