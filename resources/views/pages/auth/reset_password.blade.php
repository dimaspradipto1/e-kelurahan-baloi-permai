@extends('layouts.dashboard.template')

@section('content')
<div class="hold-transition login-page">
  <div class="login-box">
    <div class="card card-outline card-success">
      <div class="card-header text-center">
        <a href="" class="h1"><b>e-kelurahan<br>baloi permai</b></a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">You are only one step a way from your new password, recover your password now.</p>

        <form action="{{route('password.update') }}" method="POST">
          @csrf

          <div class="input-group mb-3">
            <input type="hidden" name="email" value="{{ request()->email }}" class="form-control" placeholder="email">
            
          </div>

          <div class="input-group mb-3">
            <input type="hidden" name="token" value="{{ request()->token }}" class="form-control" placeholder="token">
         
          </div>

          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>

          <div class="input-group mb-3">
            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-success btn-block">Change password</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <div class="row">
          <p class="mt-3 mb-1">
            <a href="{{ route('login') }}">Login</a>
          </p>
        </div>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
</div>
@endsection