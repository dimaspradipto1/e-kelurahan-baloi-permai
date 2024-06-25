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
              <h1>Form Daftar Ketua RT dan RW</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Form Tambah Data Penerima Sembako</li>
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
                  <h3 class="card-title text-white">Tambah Data Ketua RT dan RW</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('ketua-rt-rw.store') }}" method="POST">
                  @csrf

                  <div class="card-body">

                    <div class="form-group">
                      <label for="nama" class="text-uppercase">nama</label>
                      <select name="nama" id="nama" class="form-control select2">
                        <option value="selected"> --pilih--</option>
                        <option disabled>---------------</option>
                        @foreach ($warga as $item)
                          <option value="{{ $item->nama }}">{{ $item->nama }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="name" class="text-uppercase">tempat lahir</label>
                      <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" value="{{ old('tempat_lahir') }}" placeholder="masukkan tempat lahir">
                    </div>

                    <div class="form-group">
                      <label for="name" class="text-uppercase">tanggal lahir</label>
                      <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
                    </div>

                    <div class="form-group">
                      <label for="rw" class="text-uppercase">jabatan rw</label>
                      <select name="rw" class="form-control select2">
                        <option value="selected"> --pilih-- </option>
                        @foreach($rws as $item)
                        <option value="{{ $item->rw }}">{{ $item->rw }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="rt" class="text-uppercase">jabatan rt</label>
                     <select name="rt" class="form-control select2">
                      <option value="selected"> --pilih-- </option>
                      @foreach ($rts as $item)
                      <option value="{{ $item->rt }}">{{ $item->rt }}</option>
                      @endforeach
                     </select>
                    </div>

                    <div class="form-group">
                      <label for="name" class="text-uppercase">nomor sk</label>
                     <input type="text" class="form-control" name="no_sk" id="no_sk" value="{{ old('no_sk') }}" placeholder="masukkan nomor sk">
                    </div>

                    <div class="form-group">
                      <label for="tmt" class="text-uppercase">tmt awal</label>
                      <input type="date" name="tmt_awal" value="{{ old('tmt_awal') }}" class="form-control" id="tmt_awal" placeholder="masukkan tmt awal" >
                    </div>

                    <div class="form-group">
                      <label for="keterangan" class="text-uppercase">alamat</label>
                     <textarea name="alamat" class="form-control" id="" cols="20" rows="5" placeholder="masukkan alamat">{{ old('alamat') }}</textarea>
                    </div>
  
                    <div class="form-group">
                      <label for="pekerjaan" class="text-uppercase">pekerjaan</label>
                     <input type="text" name="pekerjaan" id="pekerjaaan" class="form-control" placeholder="masukkan pekerjaanmu">
                    </div>

                    <div class="form-group">
                      <label for="name" class="text-uppercase">no hp</label>
                      <input type="number" name="no_hp" value="{{ old('no_hp') }}" class="form-control" id="no_hp" placeholder="masukkan no hp" >  
                    </div>

                    <div class="form-group">
                      <label for="nik" class="text-uppercase">nik</label>
                      <input type="number" name="nik" value="{{ old('nik') }}" class="form-control" id="nik" placeholder="masukkan nik" >  
                    </div>

                    <div class="form-group">
                      <label for="npwp">npwp</label>
                      <input type="number" name="npwp" value="{{ old('npwp') }}" class="form-control" id="npwp" placeholder="masukkan npwp" >  
                    </div>

                    <div class="form-group">
                      <label for="keterangan" class="text-uppercase">keterangan</label>
                     <textarea name="keterangan" class="form-control" id="" cols="20" rows="5" placeholder="masukkan keterangan">{{ old('keterangan') }}</textarea>
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
