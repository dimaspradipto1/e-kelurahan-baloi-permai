@extends('layouts.dashboard.template')

@section('content')

@include('sweetalert::alert')
@include('layouts.dashboard.navbar')
@include('layouts.dashboard.sidebar')

<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('/dashboard/dist/img/logo.png') }}" alt="logo" height="60" width="60">
  </div>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#" class="text-success">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

        <div class="row">

          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="fa-solid fa-users"></i>
              </span>
              <div class="info-box-content">
                <span class="info-box-text">Data Penduduk</span>
                <h5>{{ $warga }}</h5>
              </div>
            </div>
          </div>

          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="fa-solid fa-house-user"></i>
              </span>
              <div class="info-box-content">
                <span class="info-box-text">Data Pendatang</span>
                <h5>{{ $pendatang }}</h5>
              </div>
            </div>
          </div>

          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-warning text-white"><i class="fa-solid fa-house-user"></i>
              </span>
              <div class="info-box-content">
                <span class="info-box-text">Data Pindah</span>
                <h5>{{ $pindah }}</h5>
              </div>
            </div>
          </div>

          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-secondary"><i class="fa-solid fa-person-shelter"></i>
              </span>
              <div class="info-box-content">
                <span class="info-box-text">Data Ketua RT/RW</span>
                <h5>{{ $ketuartrw }}</h5>
              </div>
            </div>
          </div>

          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-secondary"><i class="fa-solid fa-file-lines"></i>
              </span>
              <div class="info-box-content">
                <span class="info-box-text">Data Surat Keterangan</span>
                <h5>{{ $surat }}</h5>
              </div>
            </div>
          </div>

          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="fa-solid fa-hand-holding-dollar"></i>
              </span>
              <div class="info-box-content">
                <span class="info-box-text">Data Penerima Sembako</span>
                <h5>{{ $sembako }}</h5>
              </div>
            </div>
          </div>

          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-danger"><i class="fa-solid fa-skull-crossbones"></i>
              </span>
              <div class="info-box-content">
                <span class="info-box-text">Data Kematian</span>
                <h5>{{ $kematian }}</h5>
              </div>
            </div>
          </div>

          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="fa-solid fa-people-roof"></i>
              </span>
              <div class="info-box-content">
                <span class="info-box-text">Data Pernikahan</span>
                <h5>{{ $pernikahan }}</h5>
              </div>
            </div>
          </div>

        </div>

        <div class="row">
          <section class="col-lg-6">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title text-white">Chart Penduduk</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="pieChart"
                  style="min-height: 250px; height: 425px; max-height: 425px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
          </section>

          <section class="col-lg-6">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title text-white">Jumlah Penerima Sembako</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <table id="example" class="display compact" style="width: 100%">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Tahun</th>
                      <th>jumlah penerima</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($dataTahap as $item)
                    <tr>
                      <td>{{ $loop->iteration}}</td>
                      <td>{{ $item->tahun }}</td>
                      <td>{{ $item->jumlah }}</td>
                    </tr>
                    @endforeach
                </table>
              </div>
            </div>
          </section>
          
        </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @include('layouts.dashboard.footer')

</div>
<!-- ./wrapper -->

@endsection