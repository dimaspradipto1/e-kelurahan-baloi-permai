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
              <h1>Form Edit Data Dunia Usaha</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Form Edit Data Dunia Usaha</li>
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
                  <h3 class="card-title text-white">Edit Data Dunia Usaha</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('dunia-usaha.update', $duniausaha->id) }}" method="POST">
                  @csrf
                  @method('PUT')

                  <div class="card-body">

                    <div class="form-group">
                      <label for="nama" class="text-uppercase">nama usaha</label>
                      <input type="text" name="nama_usaha" value="{{ old('nama_usaha') ?? $duniausaha->nama_usaha}}" class="form-control @error('nama_usaha') is-invalid @enderror" id="nama_usaha" placeholder="masukkan nama usaha" >
                      @error('nama_usaha')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label for="alamt" class="text-uppercase">alamat usaha</label>
                      <textarea placeholder="masukkan alamat ..." name="alamat" class="form-control @error('alamat') is-invalid @enderror" cols="30"
                      rows="3">{{ old('alamat') ?? $duniausaha->alamat}}</textarea>
                    </div>

                    <div class="form-group">
                      <label for="rt"class="text-uppercase">rt</label>
                     <select name="rt" class="form-control select2 @error('rt') is-invalid @enderror">
                      <option value="selected"> --pilih RT-- </option>
                      @foreach ($rts as $item)
                      <option value="{{ $item->rt }}" {{ $item->rt == $duniausaha->rt ? 'selected' : '' }}>{{ $item->rt }}</option>
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
                        <option value="{{ $item->rw }}" {{ $item->rw == $duniausaha->rw ? 'selected' : '' }}>{{ $item->rw }}</option>
                        @endforeach
                      </select>
                      @error('rw')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label for="name" class="text-uppercase">no hp</label>
                      <input type="number" name="no_hp" value="{{ old('no_hp') ?? $duniausaha->no_hp}}" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" placeholder="masukkan no hp">
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
