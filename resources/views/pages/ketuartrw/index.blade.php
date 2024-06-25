@extends('layouts.dashboard.template')

@section('content')

<div class="hold-transition sidebar-mini">

  @include('sweetalert::alert')
  @include('layouts.dashboard.navbar')
  @include('layouts.dashboard.sidebar')

  <div class="wrapper">

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>DATA DAFTAR KETUA RT/RW</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Data Ketua RT/RW</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">

                  {{-- import excel --}}
                  <div class="modal fade" id="importExcel" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <form action="{{ route('import-ketua-rt-rw') }}" method="POST" enctype="multipart/form-data">

                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                          </div>
                          <div class="modal-body">

                            {{ csrf_field() }}

                            <label>Pilih file excel</label>
                            <div class="form-group">
                              <input type="file" name="file" required="required">
                            </div>

                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Import</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>

                  {{-- end import excel --}}
                  <a href="{{ route('ketua-rt-rw.create') }}" class="btn btn-secondary mb-2">Tambah</a>

                  <a href="{{ route('export-ketua-rt-rw') }}" class="btn btn-outline-success mb-2" target="_blank"><i
                    class="fa-regular fa-file-excel"></i> EXPORT
                    EXCEL</a>

                  <button type="button" class="btn btn-outline-primary mb-2" data-toggle="modal"
                    data-target="#importExcel"><i
                    class="fa-regular fa-file-excel"></i>
                    IMPORT EXCEL
                  </button>

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div style="overflow: auto;" class="mw-100">
                    {!! $dataTable->table([
                      'class' => 'ui called table',
                      'style'=> 'width:100%'  
                    ]) !!}
                  </div>
                  {{-- <table id="" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th rowspan="2">ID</th>
                        <th rowspan="2" style="vertical-align: center text-align: center">Nama</th>
                        <th rowspan="2">Tempat Lahir</th>
                        <th rowspan="2">Tanggal Lahir</th>
                        <th colspan="2" style="text-align: center">Jabatan</th>
                        <th colspan="2" style="text-align: center">SK</th>
                        <th rowspan="2">Alamat</th>
                        <th rowspan="2">Pekerjaan</th>
                        <th rowspan="2">No HP</th>
                        <th rowspan="2">NIK</th>
                        <th rowspan="2">NPWP</th>
                        <th rowspan="2">KETERANGAN</th>
                      </tr>

                      <tr>
                        <th>RW</th>
                        <th>RT</th>
                        <th>NO</th>
                        <th>TMT AWAL</th>
                      </tr>

                    </thead>
                    {!! $dataTable->table() !!}
                  </table> --}}

                 
                 
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

            </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    @push('scripts')
    {!! $dataTable->scripts() !!}
      
    @endpush
  </div>
  <!-- ./wrapper -->

  @include('layouts.dashboard.footer')
</div>

@endsection