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
            <h1>DETAIL WARGA</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Detail Warga</li>
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
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Data Detail</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal">
                <div class="card-body">
                  
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">NIK</label>
                    <label for="inputEmail3" class="col-sm-10 col-form-label">: {{ $warga->nik }}</label>
                  </div>

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">KK</label>
                    <label for="inputEmail3" class="col-sm-10 col-form-label">: {{ $warga->kk }}</label>
                  </div>

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Warga</label>
                    <label for="inputEmail3" class="col-sm-10 col-form-label">: {{ $warga->nama }}</label>
                  </div>

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">JENIS KELAMIN</label>
                    <label for="inputEmail3" class="col-sm-10 col-form-label">: {{ $warga->jenis_kelamin }}</label>
                  </div>

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">TEMPAT LAHIR</label>
                    <label for="inputEmail3" class="col-sm-10 col-form-label">: {{ $warga->tempat_lahir }}</label>
                  </div>

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">TANGGAL LAHIR</label>
                    <label for="inputEmail3" class="col-sm-10 col-form-label">: {{ \Carbon\Carbon::parse($warga->tanggal_lahir)->format('d/m/Y') }}</label>
                  </div>

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">GOLONGAN DARAH</label>
                    <label for="inputEmail3" class="col-sm-10 col-form-label">: {{ $warga->golongan_darah }}</label>
                  </div>

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">PENDIDIKAN</label>
                    <label for="inputEmail3" class="col-sm-10 col-form-label">: {{ $warga->pendidikan }}</label>
                  </div>

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">PEKERJAAN</label>
                    <label for="inputEmail3" class="col-sm-10 col-form-label">: {{ $warga->pekerjaan }}</label>
                  </div>

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">STATUS PERKAWINAN</label>
                    <label for="inputEmail3" class="col-sm-10 col-form-label">: {{ $warga->status_perkawinan }}</label>
                  </div>

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">NAMA AYAH</label>
                    <label for="inputEmail3" class="col-sm-10 col-form-label">: {{ $warga->nama_ayah }}</label>
                  </div>

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">NAMA IBU</label>
                    <label for="inputEmail3" class="col-sm-10 col-form-label">: {{ $warga->nama_ibu }}</label>
                  </div>

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">ALAMAT DOMISILI</label>
                    <label for="inputEmail3" class="col-sm-10 col-form-label">: {{ $warga->alamat_domisili }}</label>
                  </div>

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">ALAMAT KTP</label>
                    <label for="inputEmail3" class="col-sm-10 col-form-label">: {{ $warga->alamat_ktp }}</label>
                  </div>

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">RT</label>
                    <label for="inputEmail3" class="col-sm-10 col-form-label">: {{ $warga->rt }}</label>
                  </div>

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">RW</label>
                    <label for="inputEmail3" class="col-sm-10 col-form-label">: {{ $warga->rw }}</label>
                  </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <a href="{{ route('warga.index') }}" class="btn btn-warning text-white"><i class="fa-solid fa-right-from-bracket"></i> kembali</a>
                </div>
                <!-- /.card-footer -->
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

{{-- <div class="form-group">
  <label for="exampleInputFile">File input</label>
  <div class="input-group">
    <div class="custom-file">
      <input type="file" class="custom-file-input" id="exampleInputFile">
      <label class="custom-file-label" for="exampleInputFile">Choose file</label>
    </div>
    <div class="input-group-append">
      <span class="input-group-text">Upload</span>
    </div>
  </div>
</div> --}}