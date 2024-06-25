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
              <h1>Form Tambah Warga Pendatang</h1>
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
                <form action="{{ route('pendatang.store') }}" method="POST">
                  @csrf

                  <div class="card-body">

                    <div class="form-group">
                      <label for="nik" class="text-uppercase">nik</label>
                      <input type="number" name="nik" value="{{ old('nik') }}" class="form-control" id="nik" placeholder="masukkan nik" >
                    </div>

                    <div class="form-group">
                      <label for="nama" class="text-uppercase">nama</label>
                      <input type="text" name="warga" value="{{ old('warga') }}" class="form-control" id="warga" placeholder="masukkan warga" >
                    </div>

                    <div class="form-group">
                      <label for="alamat_asal" class="text-uppercase">alamat asal</label>
                      <textarea placeholder="masukkan alamat asal..." name="alamat_asal" class="form-control" cols="30"
                      rows="3">{{ old('alamat_asal') }}</textarea>
                    </div>

                    <div class="form-group">
                      <label for="kelurahan" class="text-uppercase">kelurahan</label>
                      <select name="kelurahan" class="form-control select2" style="width: 100%">
                        <option value="selected"> --pilih kelurahan-- </option>
                        @foreach ($kelurahan as $item )
                          <option value="{{ $item->kelurahan }}">{{ $item->kelurahan }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="kecamatan" class="text-uppercase">kecamatan</label>
                      <select name="kecamatan" class="form-control select2" style="width: 100%">
                      <option value="selected"> --pilih kecamatan-- </option>
                        @foreach ($kecamatan as $item )
                          <option value="{{ $item->kecamatan }}">{{ $item->kecamatan }}</option>
                        @endforeach
                      </select>
                    </div>
                  
                    <div class="form-group">
                      <label for="alamat_tujuan" class="text-uppercase">alamat tujuan</label>
                      <textarea placeholder="masukkan alamat tujuan..." name="alamat_tujuan" class="form-control" cols="30"
                        rows="3">{{ old('alamat_tujuan') }}</textarea>
                    </div>

                    <div class="form-group">
                      <label for="tujuan_rt" class="text-uppercase">tujuan rt</label>
                      <select class="form-control select2" name="rt" value="{{ old('rt') }}" style="width: 100%;">
                        <option selected="selected"> --pilih RT-- <i class="fa fa-rotate-left" aria-hidden="true"></i>-- </option>
                        @foreach ($rts as $item )
                          <option value="{{ $item->rt }}">{{ $item->rt }}</option>
                        @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                      <label for="tujuan_rw" class="text-uppercase">tujuan rw</label>
                      
                      <select class="form-control select2" name="rw" value="{{ old('rw') }}" style="width: 100%;">
                        <option selected="selected"> --pilih RW-- </option>
                        @foreach ($rws as $item )
                          <option value="{{ $item->rw }}">{{ $item->rw }}</option>
                        @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                      <label for="tanggal_datang" class="text-uppercase">tanggal datang</label>
                      <input type="date" name="tanggal_datang" value="{{ old('tanggal_datang') }}" class="form-control" id="tanggal_datang" placeholder="masukkan tanggal datang" >
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