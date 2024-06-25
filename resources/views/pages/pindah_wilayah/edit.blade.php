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
              <h1>Form Ubah Warga Pindah Dalam Wilayah</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Form Ubah Warga Pindah Dalam Wilayah</li>
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
                  <h3 class="card-title text-white">Ubah Data Warga Dalam Wilayah</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('pindah_wilayah.update', $pindahWilayah->id) }}" method="POST">
                  @csrf
                  @method('PUT')

                  <div class="card-body">

                    <div class="form-group">
                      <label for="name" class="text-uppercase">nama warga</label>
                      
                      <select class="form-control select2" name="warga" value="{{ old('warga') }}" style="width: 100%;">
                        <option selected="selected"> --pilih warga-- </option>
                        @foreach ($warga as $item )
                          <option value="{{ $item->nama }}" {{ $item->nama == $pindahWilayah->warga ? 'selected' : '' }}>{{ $item->nama }}</option>
                        @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                      <label for="rt" class="text-uppercase">nik</label>
                      <select name="nik" class="form-control select2" value="{{ old('nik') }}" style="width: 100%">
                        <option selected="selected">--pilih nik--</option>
                        @foreach ($warga as $item )
                          <option value="{{ $item->nik }}" {{ $item->nik == $pindahWilayah->nik ? 'selected' : '' }}>{{ $item->nik }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="name" class="text-uppercase">alamat asal</label>
                      
                      <select class="form-control select2" name="alamat_asal" value="{{ old('alamat_asal') }}" style="width: 100%;">
                        <option selected="selected"> --pilih alamat-- </option>
                        @foreach ($warga as $item )
                          <option value="{{ $item->alamat_domisili }}" {{ $item->alamat_domisili == $pindahWilayah->alamat_asal ? 'selected' : '' }}>{{ $item->alamat_domisili }}</option>
                        @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                      <label for="name" class="text-uppercase">asal rt</label>
                      
                      <select class="form-control select2" name="rt" value="{{ old('rt') }}" style="width: 100%;">
                        <option selected="selected"> --pilih-- </option>
                        @foreach ($rt as $item )
                          <option value="{{ $item->rt }}" {{ $item->rt == $pindahWilayah->rt ? 'selected' : '' }}>{{ $item->rt }}</option>
                        @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group">
                      <label for="name" class="text-uppercase">asal rw</label>
                      
                      <select class="form-control select2" name="rw" value="{{ old('rw') }}" style="width: 100%;">
                        <option selected="selected"> --pilih-- </option>
                        @foreach ($rw as $item )
                          <option value="{{ $item->rw }}" {{ $item->rw == $pindahWilayah->rw ? 'selected' : '' }}>{{ $item->rw }}</option>
                        @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                      <label for="name" class="text-uppercase">tujuan rt</label>
                      
                      <select class="form-control select2" name="rt_tujuan" value="{{ old('rt') }}" style="width: 100%;">
                        <option selected="selected"> --pilih-- </option>
                        @foreach ($rt as $item )
                          <option value="{{ $item->rt }}" {{ $item->rt == $pindahWilayah->rt_tujuan ? 'selected' : '' }}>{{ $item->rt }}</option>
                        @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group">
                      <label for="name" class="text-uppercase">tujaun rw</label>
                      
                      <select class="form-control select2" name="rw_tujuan" value="{{ old('rw') }}" style="width: 100%;">
                        <option selected="selected"> --pilih-- </option>
                        @foreach ($rw as $item )
                          <option value="{{ $item->rw }}" {{ $item->rw == $pindahWilayah->rw_tujuan ? 'selected' : '' }}>{{ $item->rw }}</option>
                        @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                      <label for="alamat_tujuan" class="text-uppercase">alamat tujuan</label>
                      <textarea placeholder="masukkan alamat tujuan..." name="alamat_tujuan" class="form-control" cols="30"
                        rows="3">{{ old('alamat_tujuan') ?? $pindahWilayah->alamat_tujuan}}</textarea>
                    </div>

                    <div class="form-group">
                      <label for="tanggal_pindah" class="text-uppercase">Tanggal Pindah</label>
                      <input type="date" name="tanggal_pindah" value="{{ old('tanggal_pindah') ?? $pindahWilayah->tanggal_pindah }}" class="form-control" id="tanggal_pindah" >
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
