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
              <h1>Form Edit Warga Pendatang</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Form Edit Warga pendatang</li>
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
                  <h3 class="card-title text-white">Edit Data Warga Pendatang</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('pendatang.update', $pendatang->id) }}" method="POST">
                  @csrf
                  @method('PUT')

                  <div class="card-body">

                    <div class="form-group">
                      <label for="rt">NIK</label>
                      <input type="number" name="nik" value="{{ old('nik') ?? $pendatang->nik}}" class="form-control" id="nik" placeholder="masukkan nik" >
                    </div>

                    <div class="form-group">
                      <label for="nama" class="text-uppercase">nama</label>
                      <input type="text" name="warga" value="{{ old('warga') ?? $pendatang->warga }}" class="form-control" id="warga" placeholder="masukkan warga" >
                    </div>

                    <div class="form-group">
                      <label for="alamat_asal" class="text-uppercase">alamat asal</label>
                      <textarea  name="alamat_asal" class="form-control" cols="30"
                        rows="3">{{ old('alamat_asal') ?? $pendatang->alamat_asal }}</textarea>
                    </div>
                   
                  
                    <div class="form-group">
                      <label for="alamat_tuajuan" class="text-uppercase">alamat tujuan</label>
                      <textarea placeholder="masukkan alamat tujuan..." name="alamat_tujuan" class="form-control" cols="30"
                        rows="3">{{ old('alamat_tujuan') ?? $pendatang->alamat_tujuan }}</textarea>
                    </div>

                    <div class="form-group">
                      <label for="kelurahan" class="text-uppercase">kelurahan</label>
                      <input type="text" name="kelurahan" value="{{ old('kelurahan') ?? $pendatang->kelurahan }}" class="form-control" id="kelurahan"
                        placeholder="masukkan nama kelurahan">
                    </div>

                    <div class="form-group">
                      <label for="kecamatan" class="text-uppercase">kecamatan</label>
                      <input type="text" name="kecamatan" value="{{ old('kecamatan') ?? $pendatang->kecamatan }}" class="form-control" id="kecamatan"
                        placeholder="masukkan nama kecamatan">
                    </div>

                    <div class="form-group">
                      <label for="tujuan_rt" class="text-uppercase">tujuan rt</label>
                      <input type="text" name="rt" value="{{ old('rt') ?? $pendatang->rt }}" class="form-control" id="rt"
                        placeholder="masukkan RT">
                    </div>

                    <div class="form-group">
                      <label for="tuajuan_rw" class="text-uppercase">tujuan rw</label>
                      <input type="text" name="rw" value="{{ old('rw') ?? $pendatang->rw }}" class="form-control" id="rw"
                        placeholder="masukkan RW">
                    </div>

                    <div class="form-group">
                      <label for="tanggal_datang" class="text-uppercase">tanggal datang</label>
                      <input type="date" name="tanggal_datang" value="{{ old('tanggal_datang') ?? $pendatang->tanggal_datang }}" class="form-control" id="tanggal_datang" placeholder="masukkan tanggal datang" >
                    </div>

                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-warning text-white">UBAH</button>
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
