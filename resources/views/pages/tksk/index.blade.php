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
              <h1>DATA TENAGA KESEJAHTERAAN SOSIAL KECAMATAN (TKSK)</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Data Tenaga Kesejahteraan Sosial Kecamatan (TKSK)</li>
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
                  <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <form  action="{{ route('import-tksk') }}" method="POST" enctype="multipart/form-data">

                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Import Excel Tenaga Kesejahteraan Sosial Kecamatan (TKSK)</h5>
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

                  <a href="{{ route('tksk.create') }}" class="btn btn-secondary mb-2">+ Tambah</a>

                  <a href="{{ route('export-tksk') }}" class="btn btn-outline-success mb-2" target="_blank"><i class="fa-solid fa-file-excel"></i> Export Excel</a>

                  <button type="button" class="btn btn-outline-primary mb-2" data-toggle="modal" data-target="#importExcel">
                    <i class="fa-solid fa-file-excel"></i>
                   Import Excel
                  </button>

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  {!! $dataTable->table([
                    'class' => 'ui called table',
                    'style' => 'width:100%'
                  ]) !!}
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

