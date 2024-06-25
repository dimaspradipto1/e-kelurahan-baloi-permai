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
            <h1>Form Tambah Warga</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Form Tambah Warga</li>
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
              <form action="{{ route('warga.store') }}" method="POST">
                @csrf

                <div class="card-body">

                  <div class="form-group">
                    <label for="nik" class="text-uppercase">nik</label>
                    <input type="number" name="nik" value="{{ old('nik') }}" class="form-control" id="nik" placeholder="masukkan nik" >
                  </div>

                  <div class="form-group">
                    <label for="kk" class="text-uppercase">kk</label>
                    <input type="number" name="kk" value="{{ old('kk') }}" class="form-control" id="kk" placeholder="masukkan kk" >
                  </div>

                  <div class="form-group">
                    <label for="nama" class="text-uppercase">nama warga</label>
                    <input type="text" name="nama" value="{{ old('nama') }}" class="form-control" id="nama" placeholder="masukkan nama lengkap" autofocus>                    
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
                    <label for="golongan darah" class="text-uppercase">pilih golongan darah</label>
                    <select name="golongan_darah" class="form-control">
                      <option value="">-- Pilih --</option>
                      <option value="A">A</option>
                      <option value="B">B</option>
                      <option value="AB">AB</option>
                      <option value="O">O</option>
                      <option value="tidak tahu">Tidak Tahu</option>
                    </select>
                   
                  </div>

                  <div class="form-group">
                    <label for="pendidikan" class="text-uppercase">pendidikan</label>
                    <select name="pendidikan" id="pendidikan" class="form-control select2">
                      <option selected> --pilih--</option>
                      <option disabled>---------------------</option>
                      <option value="SD">SD</option>
                      <option value="SMP">SMP</option>
                      <option value="SMA">SMA</option>
                      <option value="S1">S1</option>
                      <option value="S2">S2</option>
                      <option value="S3">S3</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="pekerjaan" class="text-uppercase">pekerjaan</label>
                    <input type="text" name="pekerjaan" value="{{ old('pekerjaan') }}" class="form-control" id="pekerjaan" placeholder="masukkan pekerjaan">
                  </div>

                  <div class="form-group">
                    <label for="status perkawinan" class="text-uppercase">pilih status perkawinan</label>
                    <select name="status_perkawinan" class="form-control">
                      <option value="">-- Pilih --</option>
                      <option value="belum kawin">Belum Kawin</option>
                      <option value="kawin">Kawin</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="nama_ayah" class="text-uppercase">nama ayah</label>
                    <input type="text" name="nama_ayah" value="{{ old('nama_ayah') }}" class="form-control" id="nama_ayah" placeholder="masukkan nama ayah">
                  </div>

                  <div class="form-group">
                    <label for="nama_ibu" class="text-uppercase">nama ibu</label>
                    <input type="text" name="nama_ibu" value="{{ old('nama_ibu') }}" class="form-control" id="nama_ibu" placeholder="masukkan nama ibu" >
                    
                  </div>

                  <div class="form-group">
                    <label for="alamat_domisili" class="text-uppercase">alamat domisili</label>
                   <textarea placeholder="boleh dikosongkan..." name="alamat_domisili" class="form-control" cols="30" rows="3">{{ old('alamat_domisili') }}</textarea>
                  </div>

                  <div class="form-group">
                    <label for="alamat_ktp" class="text-uppercase">alamat ktp</label>
                   <textarea placeholder="boleh dikosongkan..." name="alamat_ktp" class="form-control" cols="30" rows="3">{{ old('alamat_ktp') }}</textarea>  
                  </div>

                  <div class="form-group">
                    <label for="rt" class="text-uppercase">rt</label>
                   <select name="rt" class="form-control select2">
                    <option value="selected"> --pilih-- </option>
                    @foreach ($rts as $item)
                    <option value="{{ $item->rt }}">{{ $item->rt }}</option>
                    @endforeach
                   </select>
                  </div>

                  <div class="form-group">
                    <label for="rw" class="text-uppercase">rw</label>
                    <select name="rw" class="form-control select2">
                      <option value="selected"> --pilih-- </option>
                      @foreach($rws as $item)
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
