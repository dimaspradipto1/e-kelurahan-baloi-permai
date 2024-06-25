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
              <h1>DATA AHLI WARIS</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Data Ahli Waris</li>
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

                   {{-- end import excel --}}
                   <a href="{{ route('ahli-waris.create') }}" class="btn btn-secondary mb-2">+ Tambah</a>

                   <a href="{{ route('export-ahli-waris') }}" class="btn btn-outline-success mb-2" target="_blank"><i class="fa-regular fa-file-excel"></i> EXPORT EXCEL</a>

                  {{-- import excel --}}
                  <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <form  action="{{ route('import-ahli-waris') }}" method="POST" enctype="multipart/form-data">

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

                  <button type="button" class="btn btn-outline-primary mb-2" data-toggle="modal" data-target="#importExcel"><i class="fa-regular fa-file-excel"></i>
                    IMPORT EXCEL
                  </button>

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  {!! $dataTable->table([
                    'class' => 'ui called table',
                    'style' => 'width:100%'  
                  ]) !!}

                    {{-- <table id="ahliwarise-table" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th rowspan="3">NO</th>
                          <th rowspan="3">NIK</th>
                          <th rowspan="3">NAMA ALMARHUM/ALMARHUMAH</th>
                          <th colspan="2">KELAHIRAN</th>
                          <th colspan="3">KEMATIAN</th>
                          <th rowspan="3">JENIS KELAMIN</th>
                          <th rowspan="3">RT</th>
                          <th rowspan="3">RW</th>
                          <th rowspan="3">TANGGAL PELAPORAN</th>
                        </tr>
                    
                        <tr>
                          <th rowspan="2">TEMPAT</th>
                          <th rowspan="2">TANGGAL</th>
                        </tr>
                    
                        <tr>
                          <th>JENIS</th>
                          <th>TEMPAT</th>
                          <th>TANGGAL</th>
                        </tr>
                      </thead>
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
    <script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
    <script src="/vendor/datatables/buttons.server-side.js"></script>
    {!! $dataTable->scripts() !!}
    @endpush
  </div>
  <!-- ./wrapper -->

  @include('layouts.dashboard.footer')
</div>

@endsection

