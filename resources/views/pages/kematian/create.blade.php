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
              <h1>Form Tambah Warga Kematian</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Form Tambah Warga pendatang</li>
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
                <form action="{{ route('kematian.store') }}" method="POST">
                  @csrf

                  <div class="card-body">

                    <div class="form-group">
                      <label for="nama_warga" class="text-uppercase">nama warga</label>
                      <select class="form-control select2" name="warga" value="{{ old('warga') }}" style="width: 100%;">
                        <option selected="selected"> --pilih warga-- </option>
                        @foreach ($warga as $item )
                          <option value="{{ $item->nama }}">{{ $item->nik }} - {{ $item->nama }}</option>
                        @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                      <label for="sebab_kematian" class="text-uppercase">sebab kematian</label>
                      <input type="text" class="form-control" name="jenis_kematian" value="{{ old('jenis_kematian') }}" placeholder="masukkan penyebab kematian" id="jenis_kematian">
                    </div>

                    <div class="form-group">
                      <label for="tempat" class="text-uppercase">Tempat</label>
                      <input type="text" class="form-control" name="tempat" value="{{ old('tempat') }}" placeholder="masukkan tempat kematian" id="tempat">
                    </div>

                    <div class="form-group">
                      <label for="tanggal_kematian" class="tetx-uppercase">tanggal kematian</label>
                      <input type="date" name="tanggal_kematian" value="{{ old('tanggal_kematian') }}" class="form-control" id="tanggal_kematian" placeholder="masukkan tanggal kematian" >
                    </div>

                    <div class="form-group">
                      <label for="jenis_kematian" class="text-uppercase">Jenis Kelamin</label>
                      <select class="form-control select2" name="jenis_kelamin" value="{{ old('jenis_kelamin') }}" style="width: 100%;">
                        <option selected="selected"> --pilih jenis kelamin-- </option>
                        <option value="laki-laki">laki-laki</option>
                        <option value="perempuan">perempuan</option>
                        </select>
                    </div>

                    <div class="form-group">
                      <label for="rt" class="text-uppercase">rt</label>
                      <select class="form-control select2" name="rt" value="{{ old('rt') }}" style="width: 100%;">
                        <option selected="selected"> --pilih RT-- <i class="fa fa-rotate-left" aria-hidden="true"></i>-- </option>
                        @foreach ($rt as $item )
                          <option value="{{ $item->rt }}">{{ $item->rt }}</option>
                        @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                      <label for="rw" class="text-uppercase">rw</label>
                      
                      <select class="form-control select2" name="rw" value="{{ old('rw') }}" style="width: 100%;">
                        <option selected="selected"> --pilih RW-- </option>
                        @foreach ($rw as $item )
                          <option value="{{ $item->rw }}">{{ $item->rw }}</option>
                        @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                      <label for="keterangan" class="text-uppercase">Keterangan Pelaporan ke Kelurahan</label>
                     <textarea name="keterangan" class="form-control" id="" cols="20" rows="5">{{ old('keterangan') }}</textarea>
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
