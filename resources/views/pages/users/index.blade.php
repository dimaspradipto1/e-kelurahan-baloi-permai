@extends('layouts.dashboard.template')

@section('content')


<div class="hold-transition sidebar-mini">

  @include('sweetalert::alert')
  @include('layouts.dashboard.navbar')
  @include('layouts.dashboard.sidebar')


  <div class="wrapper">

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>DATA PENGGUNA</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Data Pengguna</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h3>PENGGUNA</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  {!! $dataTable->table(['class' => 'ui called table'], true) !!}
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

            </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    @push('scripts')
    <script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
    <script src="/vendor/datatables/buttons.server-side.js"></script>
    {!! $dataTable->scripts() !!}
    @endpush
  </div>
  <!-- ./wrapper -->

  @include('layouts.dashboard.footer')
</div>

@endsection

