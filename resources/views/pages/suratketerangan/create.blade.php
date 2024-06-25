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
              <h1>Form Surat Keterangan</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Form Tambah Surat Keterangan</li>
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
                <form action="{{ route('surat-keterangan.store') }}" method="POST">
                  @csrf

                  <div class="card-body">

                    <div class="form-group">
                      <label for="nomor_surt" class="text-uppercase">nomor surat</label>
                      <input type="text" name="nomor_surat" value="{{ old('nomor_surat') }}" class="form-control" id="nomor_surat" placeholder="masukkan nomor surat" >
                    </div>

                    <div class="form-group">
                      <label for="tanggal_surat" class="text-uppercase">tanggal surat</label>
                      <input type="date" name="tanggal_surat" value="{{ old('tanggal_surat') }}" class="form-control" id="tanggal_surat" placeholder="masukkan tanggal surat" >
                    </div>

                    <div class="form-group">
                      <label for="nama_pemohon" class="text-uppercase">nama pemohon</label>
                     <select name="nama_pemohon" id="nama_pemohon" class="form-control select2">
                        <option value=""> --pilih-- </option>
                        <option disabled>--------------</option>
                        @foreach ($warga as $item)
                        <option value="{{ $item->nama }}">{{ $item->nik }} - {{ $item->nama }}</option>
                        @endforeach
                     </select>
                    </div>

                    <div class="form-group">
                      <label for="alamt_pemohon" class="text-uppercase">alamat pemohon</label>
                      <textarea placeholder="masukkan alamat pemohon..." name="alamat_pemohon" class="form-control" cols="30"
                      rows="3">{{ old('alamat_pemohon') }}</textarea>
                    </div>

                    <div class="form-group">
                      <label for="keperluan" class="text-uppercase">keperluan</label>
                      <textarea placeholder="masukkan keperluan..." name="keperluan" class="form-control" cols="30"
                      rows="3">{{ old('keperluan') }}</textarea>
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
