<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kelurahan Baloi Permai | Dashboard</title>
  <link rel="icon" href="{{ asset('favicon-kelurahan.ico') }}" type="image/x-icon" />

  @include('layouts.dashboard.style')
  
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="{{ asset('/dashboard/dist/img/logo.png') }}" alt="logo-kelurahan" height="80"
        width="75">
    </div>

    @include('sweetalert::alert')

    @yield('content')

  </div>
  <!-- ./wrapper -->

  @include('layouts.dashboard.script')

  
  @stack('scripts')
</body>

</html>