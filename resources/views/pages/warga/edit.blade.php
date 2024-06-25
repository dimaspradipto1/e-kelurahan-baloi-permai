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
            <h1>Form Edit Warga</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Form Edit Warga</li>
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
              <form action="{{ route('warga.update', $warga->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="card-body">

                  <div class="form-group">
                    <label for="nik">NIK</label>
                    <input type="number" name="nik" value="{{ old('nik') ?? $warga->nik}}" class="form-control" id="nik" placeholder="masukkan nik" >
                    
                  </div>

                  <div class="form-group">
                    <label for="kk">KK</label>
                    <input type="number" name="kk" value="{{ old('kk') ?? $warga->kk}}" class="form-control" id="kk" placeholder="masukkan kk" >
                  
                  </div>

                  <div class="form-group">
                    <label for="nama">Nama Warga</label>
                    <input type="text" name="nama" value="{{ old('nama') ?? $warga->nama }}" class="form-control" id="nama" placeholder="masukkan nama lengkap" autofocus>
                    
                  </div>

                  <div class="form-group">
                    <label for="kk">Pilih Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control">
                      <option selected>-- Pilih --</option>
                      <option value="laki-laki" {{ $warga->jenis_kelamin === 'laki-laki' ? 'selected' : '' }}>laki-laki</option>
                      <option value="perempuan" {{ $warga->jenis_kelamin === 'perempuan' ? 'selected' : '' }}>perempuan</option>
                    </select>
                    
                  </div>

                  <div class="form-group">
                    <label for="tempat_lahir">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir') ?? $warga->tempat_lahir }}" class="form-control" id="tempat_lahir" placeholder="masukkan tempat lahir">
                    
                  </div>

                  <div class="form-group">
                    <label for="tempat_lahir">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') ?? $warga->tanggal_lahir }}" class="form-control" id="tanggal_lahir" >
                    
                  </div>

                  <div class="form-group">
                    <label for="agama">Agama</label>
                    <select name="agama" id="agama" class="form-control select2">
                      <option selected>-- pilih agama --</option>
                      <option value="islam" {{ $warga->agama === 'islam' ? 'selected' : '' }}>islam</option>
                      <option value="kristen" {{ $warga->agama === 'kristen' ? 'selected' : '' }}>kristen</option>
                      <option value="hindu" {{ $warga->agama === 'hindu' ? 'selected' : ''}}>hindu</option>
                      <option value="budha" {{ $warga->budha === 'budha' ? 'selected' : ''}}>budha</option>
                    </select>
                  </div>
                  
                  <div class="form-group">
                    <label for="golongan_darah">Pilih Golongan Darah</label>
                    <select name="golongan_darah" class="form-control">
                      <option selected>-- Pilih --</option>
                      <option value="A" {{ $warga->golongan_darah === 'A' ? 'selected' : '' }}>A</option>
                      <option value="B" {{ $warga->golongan_darah === 'B' ? 'selected' : '' }}>B</option>
                      <option value="AB" {{ $warga->golongan_darah === 'AB' ? 'selected' : '' }}>AB</option>
                      <option value="O" {{ $warga->golongan_darah === 'O' ? 'selected' : '' }}>O</option>
                      <option value="tidak tahu" {{ $warga->golongan_darah === 'tidak tahu' ? 'selected' : '' }}>Tidak Tahu</option>
                    </select>
                    @error('golongan_darah')
                      <div class="alert alert-danger mt-2">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="pendidikan" class="text-uppercase">pendidikan</label>
                    <select name="pendidikan" id="pendidikan" class="form-control select2">
                      <option selected> --pilih--</option>
                      <option disabled>---------------------</option>
                      <option value="SD" {{ $warga->pendidikan === 'SD' ? 'selected' : '' }}>SD</option>
                      <option value="SMP" {{ $warga->pendidikan === 'SMP' ? 'selected' : '' }}>SMP</option>
                      <option value="SMA" {{ $warga->pendidikan === 'SMA' ? 'selected' : '' }}>SMA</option>
                      <option value="S1" {{ $warga->pendidikan === 'S1' ? 'selected' : '' }}>S1</option>
                      <option value="S2" {{ $warga->pendidikan === 'S2' ? 'selected' : '' }}>S2</option>
                      <option value="S3" {{ $warga->pendidikan === 'S3' ? 'selected' : '' }}>S3</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="pekerjaan">Pekerjaan</label>
                    <input type="text" name="pekerjaan" value="{{ old('pekerjaan') ?? $warga->pekerjaan }}" class="form-control" id="pekerjaan" placeholder="masukkan pekerjaan">
                   
                  </div>

                  <div class="form-group">
                    <label for="perkawinan">Pilih Status Perkawinan</label>
                    <select name="status_perkawinan" class="form-control">
                      <option selected>-- Pilih --</option>
                      <option value="belum kawin"  {{ $warga->status_perkawinan === 'belum kawin' ? 'selected' : '' }}>Belum Kawin</option>
                      <option value="kawin" {{ $warga->status_perkawinan === 'kawin' ? 'selected' : '' }}>Kawin</option>
                    </select>
                    
                  </div>

                  <div class="form-group">
                    <label for="nama_ayah">Nama Ayah</label>
                    <input type="text" name="nama_ayah" value="{{ old('nama_ayah') ?? $warga->nama_ayah }}" class="form-control" id="nama_ayah" placeholder="masukkan nama ayah">
                    
                  </div>

                  <div class="form-group">
                    <label for="nama_ibu">Nama Ibu</label>
                    <input type="text" name="nama_ibu" value="{{ old('nama_ibu') ?? $warga->nama_ibu }}" class="form-control" id="nama_ibu" placeholder="masukkan nama ibu" >
                    
                  </div>

                  <div class="form-group">
                    <label for="alamat_domisili">Alamat Domisili</label>
                   <textarea placeholder="boleh dikosongkan..." name="alamat_domisili" class="form-control" cols="30" rows="3">{{ old('alamat_domisili') ?? $warga->alamat_domisili }}</textarea>
                   
                  </div>
                  <div class="form-group">
                    <label for="alamat_ktp">Alamat KTP</label>
                   <textarea placeholder="boleh dikosongkan..." name="alamat_ktp" class="form-control" cols="30" rows="3">{{ old('alamat_ktp') ?? $warga->alamat_ktp }}</textarea>
                    
                  </div>

                  <div class="form-group">
                    <label for="rt" class="text-uppercase">rt</label>
                   <select name="rt" class="form-control select2">
                    <option value="selected"> --pilih-- </option>
                    @foreach ($rts as $item)
                    <option value="{{ $item->rt }}" {{ $item->rt == $warga->rt ? 'selected' : '' }}>{{ $item->rt }}</option>
                    @endforeach
                   </select>
                  </div>

                  <div class="form-group">
                    <label for="rw" class="text-uppercase">rw</label>
                    <select name="rw" class="form-control select2">
                      <option value="selected"> --pilih-- </option>
                      @foreach($rws as $item)
                      <option value="{{ $item->rw }}" {{ $item->rw == $warga->rw ? 'selected' : '' }}>{{ $item->rw }}</option>
                      @endforeach
                    </select>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-success">UBAH</button>
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