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
              <h1>Form Penerima Sembako</h1>
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
                  <h3 class="card-title text-white">Tambah Data Penerima Sembako</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('sembako.update', $sembako->id) }}" method="POST">
                  @csrf
                  @method('PUT')

                  <div class="card-body">

                    <div class="form-group">
                      <label for="nama_penerima" class="text-uppercase">nama penerima</label>
                      <select name="nama" id="nama" class="form-control select2 mb-2">
                        <option value=""> --pilih-- </option>
                        <option disabled>--------------</option>
                        @foreach ($warga as $item)
                        <option value="{{ $item->nama }}" {{ $item->nama == $sembako->nama ? 'selected' : '' }}>{{ $item->nama }}</option>
                        @endforeach
                      </select>
                    </div>


                    <div class="form-group">
                      <label for="nik" class="text-uppercase">nik</label>
                      <select name="nik" id="nik" class="form-control select2">
                        <option value="selected"> --pilih-- </option>
                        <option disabled>--------------</option>
                        @foreach ($warga as $item)
                        <option value="{{ $item->nik }}" {{ $item->nik == $sembako->nik ? 'selected' : '' }}>{{
                          $item->nik }} - {{ $item->nama }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="kk" class="text-uppercase">kk</label>
                      <select name="kk" id="kk" class="form-control select2">
                        <option value="selected"> --pilih-- </option>
                        <option disabled>--------------</option>
                        @foreach ($warga as $item)
                        <option value="{{ $item->kk }}" {{ $item->kk == $sembako->kk ? 'selected' : '' }}>{{ $item->kk
                          }} - {{ $item->nama }}</option>
                        @endforeach
                      </select>
                    </div>

                    <label for="alamat_domisili">Alamat</label>
                    <textarea name="alamat" id="alamat_domisili" class="form-control" rows="3"
                      placeholder="masukkan alamat">{{ old('alamat') ?? $sembako->alamat }}</textarea>

                    <div class="form-group">
                      <label for="rt" class="text-uppercase">rt</label>
                      <select name="rt" class="form-control select2">
                        <option value="selected"> --pilih RT-- </option>
                        @foreach ($rts as $item)
                        <option value="{{ $item->rt }}" {{ $item->rt == $sembako->rt ? 'selected' : '' }}>{{ $item->rt
                          }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="rw" class="text-uppercase">rw</label>
                      <select name="rw" class="form-control select2">
                        <option value="selected"> --pilih RW-- </option>
                        @foreach($rws as $item)
                        <option value="{{ $item->rw }}" {{ $item->rw == $sembako->rw ? 'selected' : ''}}>{{ $item->rw }}
                        </option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="no_hp" class="text-uppercase">no hp</label>
                      <input type="number" name="no_hp" value="{{ old('no_hp') ?? $sembako->no_hp}}"
                        class="form-control" id="no_hp" placeholder="masukkan no hp">
                    </div>

                    <div class="form-group">
                      <label for="tahap" class="text-uppercase">tahap</label>
                      <input type="text" name="tahap" value="{{ old('tahap') ?? $sembako->tahap }}" class="form-control" id="tahap">  
                    </div>

                    <div class="form-group">
                      <label for="tahun" class="text-uppercase">tahun</label>
                      <input type="number" name="tahun" value="{{ old('tahun') ?? $sembako->tahun }}" class="form-control" id="tahun">  
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