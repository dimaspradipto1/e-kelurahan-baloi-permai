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
              <h1>Form Tambah Pernikahan Warga</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Form Tambah Pernikahan Warga</li>
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
                  <h3 class="card-title text-white">Tambah Data Pernikahan</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('pernikahan.store') }}" method="POST">
                  @csrf

                  <div class="card-body">

                    <div class="form-group">
                      <label for="rt">NO SURAT</label>
                      <input type="text" name="no_surat" value="{{ old('no_surat') }}" class="form-control" id="no_surat" placeholder="masukkan no surat" >
                    </div>

                    <div class="form-group">
                      <label for="name">Tanggal SURAT</label>
                      <input type="date" name="tanggal_surat" value="{{ old('tanggal_surat') }}" class="form-control" id="tanggal_surat" placeholder="masukkan tanggal surat" >
                    </div>

                    <div class="form-group">
                      <label for="name">Nama Warga</label>
                      <input type="text" name="nama" value="{{ old('nama') }}" class="form-control" id="nama" placeholder="masukkan nama warga" >  
                    </div>

                    <div class="form-group">
                      <label for="name">Nik Warga</label>
                      <input type="number" name="nik" value="{{ old('nik') }}" class="form-control" id="nik" placeholder="masukkan nik warga" >  
                    </div>

                    <div class="form-group">
                      <label for="name">ALAMAT</label>
                      <textarea placeholder="masukkan alamat" name="alamat" class="form-control" cols="30"
                      rows="3">{{ old('alamat') }}</textarea>
                    </div>

                    <div class="form-group">
                      <label for="rt" class="text-uppercase">rt</label>
                      <select class="form-control select2" name="rt" value="{{ old('rt') }}" style="width: 100%;">
                        <option selected="selected"> --pilih RT-- <i class="fa fa-rotate-left" aria-hidden="true"></i>-- </option>
                        @foreach ($rts as $item )
                          <option value="{{ $item->rt }}">{{ $item->rt }}</option>
                        @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                      <label for="rw" class="text-uppercase">rw</label>
                      
                      <select class="form-control select2" name="rw" value="{{ old('rw') }}" style="width: 100%;">
                        <option selected="selected"> --pilih RW-- </option>
                        @foreach ($rws as $item )
                          <option value="{{ $item->rw }}">{{ $item->rw }}</option>
                        @endforeach
                        </select>
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
