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
              <h1>Form Tambah Data Fasum</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Form Tambah Data Fasum</li>
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
                  <h3 class="card-title text-white">Tambah Data Fasum</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('fasum.store') }}" method="POST">
                  @csrf

                  <div class="card-body">

                    <div class="form-group">
                      <label for="rt">DOKUMEN LEGALITAS</label>
                      <input type="text" name="dokumen_legalitas" value="{{ old('dokumen_legalitas') }}" class="form-control @error ('dokumen_legalitas') is-invalid @enderror" id="dokumen_legalitas" placeholder="masukkan nomor dokumen legalitas" >
                      @error('dokumen_legalitas')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label for="rt">NAMA FASUM</label>
                      <input type="text" name="nama" value="{{ old('nama') }}" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="masukkan nama fasum" >
                      @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label for="name">AlAMAT FASUM</label>
                      <textarea placeholder="masukkan alamat fasum..." name="alamat" class="form-control @error('alamat') is-invalid @enderror" cols="30"
                      rows="3">{{ old('alamat') }}</textarea>
                      @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label for="rt">RT</label>
                     <select name="rt" class="form-control select2 @error('rt') is-invalid @enderror" id="rt">
                      <option value="selected"> --pilih RT-- </option>
                      @foreach ($rts as $item)
                      <option value="{{ $item->rt }}">{{ $item->rt }}</option>
                      @endforeach
                     </select>
                      @error('rt')
                        <div id="rt" class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
  
                    <div class="form-group">
                      <label for="rw">RW</label>
                      <select name="rw" class="form-control select2 @error('rw') is-invalid @enderror">
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
                      <label for="name">NO HP</label>
                      <input type="number" name="no_hp" value="{{ old('no_hp') }}" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" placeholder="masukkan no hp" >  
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
