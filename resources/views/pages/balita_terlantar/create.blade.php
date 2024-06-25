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
              <h1>Form Tambah Data Balita Terlantar</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Form Tambah Data Balita Terlantar</li>
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
                  <h3 class="card-title text-white">Tambah Data Balita Terlantar</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('balita-terlantar.store') }}" method="POST">
                  @csrf

                  <div class="card-body">

                    <div class="form-group">
                      <label for="nama" class="text-uppercase">nama</label>
                     <select name="nama" id="nama" class="form-control select2">
                      <option value="selected"> --pilih-- </option>
                      @foreach ($warga as $item)
                        <option value="{{ $item->nama }}">{{ $item->nik }} - {{ $item->nama }}</option>
                      @endforeach
                     </select>
                      @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label for="nama" class="text-uppercase">nik</label>
                     <select name="nik" id="nama" class="form-control select2">
                      <option value="selected"> --pilih-- </option>
                      @foreach ($warga as $item)
                        <option value="{{ $item->nik }}">{{ $item->nik }} - {{ $item->nama }}</option>
                      @endforeach
                     </select>
                      @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label for="nama" class="text-uppercase">kk</label>
                     <select name="kk" id="nama" class="form-control select2">
                      <option value="selected"> --pilih-- </option>
                      @foreach ($warga as $item)
                        <option value="{{ $item->kk }}">{{ $item->kk }} - {{ $item->nama }}</option>
                      @endforeach
                     </select>
                      @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label for="kk" class="text-uppercase">pilih jenis kelamin</label>
                      <select name="jenis_kelamin" class="form-control">
                        <option value="">-- Pilih --</option>
                        <option value="laki-laki">laki-laki</option>
                        <option value="perempuan">perempuan</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="tempat_lahir" class="text-uppercase">tempat lahir</label>
                      <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}" class="form-control" id="tempat_lahir" placeholder="masukkan tempat lahir">
                    </div>
  
                    <div class="form-group">
                      <label for="tempat_lahir" class="text-uppercase">tanggal lahir</label>
                      <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" class="form-control" id="tanggal_lahir" >
                    </div>

                    <div class="form-group">
                      <label for="agama" class="text-uppercase">agama</label>
                      <select name="agama" id="agama" class="form-control select2">
                        <option selected>--pilih--</option>
                        <option value="islam">islam</option>
                        <option value="kristen">kristen</option>
                        <option value="hindu">hindu</option>
                        <option value="budha">budha</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="alamat" class="text-uppercase">alamat</label>
                      <textarea placeholder="masukkan alamat ..." name="alamat" class="form-control @error('alamat') is-invalid @enderror" cols="30"
                      rows="3">{{ old('alamat')  }}</textarea>
                    </div>

                    <div class="form-group">
                      <label for="rt"class="text-uppercase">rt</label>
                     <select name="rt" class="form-control select2 @error('rt') is-invalid @enderror">
                      <option value="selected"> --pilih RT-- </option>
                      @foreach ($rts as $item)
                      <option value="{{ $item->rt }}">{{ $item->rt }}</option>
                      @endforeach
                     </select>
                      @error('rt')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
  
                    <div class="form-group">
                      <label for="rw" class="text-uppercase">rw</label>
                      <select name="rw" class="form-control @error('rw') is-invalid @enderror select2">
                        <option value="selected"> --pilih RW-- </option>
                        @foreach($rws as $item)
                        <option value="{{ $item->rw }}">{{ $item->rw }}</option>
                        @endforeach
                      </select>
                      @error('rw')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label for="name" class="text-uppercase">no hp</label>
                      <input type="number" name="no_hp" value="{{ old('no_hp') }}" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" placeholder="masukkan no hp">
                      @error('no_hp')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror  
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
