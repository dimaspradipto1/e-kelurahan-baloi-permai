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
              <h1>Form Edit Data Pekerja Migran Bermasalah Sosial (pmb)</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Form Edit Data Pekerja Migran Bermasalah Sosial (pmb)</li>
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
                  <h3 class="card-title text-white">Edit Data Pekerja Migran Bermasalah Sosial (PMBS)</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('pmbs.update', $pmb->id) }}" method="POST">
                  @csrf
                  @method('PUT')

                  <div class="card-body">

                    <div class="form-group">
                      <label for="nama" class="text-uppercase">nama</label>
                     <select name="nama" id="nama" class="form-control select2">
                      <option value="selected"> --pilih-- </option>
                      @foreach ($warga as $item)
                        <option value="{{ $item->nama }}" {{ $item->nama == $pmb->nama ? 'selected' : ''}}>{{ $item->nik }} - {{ $item->nama }}</option>
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
                        <option value="{{ $item->nik }}" {{ $item->nik == $pmb->nik ? 'selected' : '' }}>{{ $item->nik }} - {{ $item->nama }}</option>
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
                        <option value="{{ $item->kk}}" {{ $item->kk == $pmb->kk ? 'selected' : '' }}>{{ $item->kk }} - {{ $item->nama }}</option>
                      @endforeach
                     </select>
                      @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label for="kk" class="text-uppercase">pilih jenis kelamin</label>
                      <select name="jenis_kelamin" class="form-control">
                        <option value="">{{ $pmb->jenis_kelamin }}</option>
                        <option value="">-- Pilih --</option>
                        <option value="laki-laki" {{ $pmb->jenis_kelamin == 'laki-laki' ? 'selected' : '' }}>laki-laki</option>
                        <option value="perempuan" {{ $pmb->jenis_kelamin == 'permpuan' ? 'selected' : '' }}>perempuan</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="tempat_lahir" class="text-uppercase">tempat lahir</label>
                      <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir') ?? $pmb->tempat_lahir }}" class="form-control" id="tempat_lahir" placeholder="masukkan tempat lahir">
                    </div>
  
                    <div class="form-group">
                      <label for="tempat_lahir" class="text-uppercase">tanggal lahir</label>
                      <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') ?? $pmb->tanggal_lahir }}" class="form-control" id="tanggal_lahir" >
                    </div>

                    <div class="form-group">
                      <label for="agama" class="text-uppercase">agama</label>
                      <select name="agama" id="agama" class="form-control select2">
                        <option selected>--pilih--</option>
                        <option value="islam" {{ $pmb->agama == 'islam' ? 'selected' : '' }}>islam</option>
                        <option value="kristen" {{ $pmb->agama == 'kristen' ? 'selected' : '' }}>kristen</option>
                        <option value="hindu" {{ $pmb->agama == 'hindu' ? 'selected' : '' }}>hindu</option>
                        <option value="budha" {{ $pmb->agama == 'budha' ? 'selected' : '' }}>budha</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="alamat" class="text-uppercase">alamat</label>
                      <textarea placeholder="masukkan alamat ..." name="alamat" class="form-control @error('alamat') is-invalid @enderror" cols="30"
                      rows="3">{{ old('alamat') ?? $pmb->alamat }}</textarea>
                    </div>

                    <div class="form-group">
                      <label for="rt"class="text-uppercase">rt</label>
                     <select name="rt" class="form-control select2 @error('rt') is-invalid @enderror">
                      <option value="selected"> --pilih RT-- </option>
                      @foreach ($rts as $item)
                      <option value="{{ $item->rt }}" {{ $item->rt == $pmb->rt ? 'selected' : '' }}>{{ $item->rt }}</option>
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
                        <option value="{{ $item->rw }}" {{ $item->rw == $pmb->rw ? 'selected' : '' }}>{{ $item->rw }}</option>
                        @endforeach
                      </select>
                      @error('rw')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label for="name" class="text-uppercase">no hp</label>
                      <input type="number" name="no_hp" value="{{ old('no_hp') ?? $pmb->no_hp }}" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" placeholder="masukkan no hp">
                      @error('no_hp')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror  
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
