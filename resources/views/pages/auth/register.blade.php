@extends('layouts.dashboard.template')

@section('content')


<div class="hold-transition register-page">
  @include('sweetalert::alert')
  
  <div class="register-box">
    <div class="card card-outline card-success">
      <div class="card-header text-center">
        <a href="#" class="h1"><b>e-kelurahan <br>baloi permai</b></a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Register a new membership</p>
  
        <form action="{{ route('registerproses') }}" method="POST">
          @csrf
          <div class="input-group mb-3">
            <input type="text" name="name" class="form-control" placeholder="Full name">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
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
              <button type="submit" class="btn btn-success btn-block">Register</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
  
        <div class="social-auth-links text-center">
          
          {{-- <a href="#" class="btn btn-block btn-secondary">
            <i class="fab fa-google mr-2"></i>
            Sign up using Google
          </a> --}}
        </div>
  
        <a href="{{ route('login') }}" class="text-center text-green">I already have a membership</a>
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
  </div>
  <!-- /.register-box -->
  
  @include('layouts.dashboard.script')
</div>
    
@endsection