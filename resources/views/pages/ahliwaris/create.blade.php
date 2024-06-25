@extends('layouts.dashboard.template')

@section('content')

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    @include('layouts.dashboard.navbar')
    @include('layouts.dashboard.sidebar')



    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Form Tambah Ahli Waris</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Form Tambah Ahli Waris</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
              <div class="card card-success">
                <div class="card-header">
                  <h3 class="card-title text-white">Tambah Data Warga</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('ahli-waris.store') }}" method="POST">
                  @csrf

                  <div class="card-body">

                    <div class="form-group">
                      <label for="tanggal" class="text-uppercase">tanggal</label>
                      <input type="date" name="tanggal" value="{{ old('tanggal') }}" class="form-control" id="tanggal_datang" placeholder="masukkan tanggal datang" >
                    </div>

                    <div class="form-group">
                      <label for="nik" class="text-uppercase">nik</label>
                      <input type="number" name="nik" value="{{ old('nik') }}" class="form-control" id="nik" placeholder="masukkan nik" >
                    </div>

                    <div class="form-group">
                      <label for="nama_meninggal" class="text-uppercase">nama orang yang meninggal</label>
                      <input type="text" name="nama_meninggal" value="{{ old('nama_meninggal') }}" class="form-control" id="nama_meninggal" placeholder="masukkan nama nama meninggal" >  
                    </div>

                    <div class="form-group">
                      <label for="nik_pemohon" class="text-uppercase">nik pemohon</label>
                      <input type="number" name="nik_pemohon" value="{{ old('nik_pemohon') }}" class="form-control" id="nik" placeholder="masukkan nik pemohon" >
                    </div>

                    <div class="form-group">
                      <label for="nama_pemohon" class="text-uppercase">nama pemohon</label>
                      <input type="text" name="nama_pemohon" value="{{ old('nama_pemohon') }}" class="form-control" id="nama_pemohon" placeholder="masukkan nama nama pemohon" >  
                    </div>

                    <div class="form-group">
                      <label for="alamat_pohomon" class="text-uppercase">alamat pemohon</label>
                      <textarea placeholder="masukkan alamat pemohon..." name="alamat_pemohon" class="form-control" cols="30"
                      rows="3">{{ old('alamat_pemohon') }}</textarea>
                    </div>

                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-success">SIMPAN</button>
                  </div>
                </form>
              </div>
              <!-- /.card -->

            </div>
            <!--/.col (left) -->

          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>

      <!-- /.content -->
    </div>
  </div>

  @include('layouts.dashboard.script')

  @include('layouts.dashboard.footer')
</body>


@endsection