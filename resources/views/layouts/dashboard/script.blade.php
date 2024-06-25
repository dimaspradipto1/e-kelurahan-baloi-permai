{{-- fontawesome --}}
<script src="https://kit.fontawesome.com/63b8672806.js" crossorigin="anonymous"></script>

<!-- jQuery -->
<script src="{{ asset('dashboard/plugins/jquery/jquery.min.js') }}"></script>

<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('dashboard/plugins/jquery-ui/jquery-ui.min.js') }}"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

<!-- Bootstrap 4 -->
<script src="{{ asset('dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- ChartJS -->
<script src="{{ asset('dashboard/plugins/chart.js/Chart.min.js') }}"></script>

<!-- Sparkline -->
<script src="{{ asset('dashboard/plugins/sparklines/sparkline.js') }}"></script>

<!-- JQVMap -->
<script src="{{ asset('dashboard/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('dashboard/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>

<!-- jQuery Knob Chart -->
<script src="{{ asset('dashboard/plugins/jquery-knob/jquery.knob.min.js') }}"></script>

<!-- daterangepicker -->
<script src="{{ asset('dashboard/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('dashboard/plugins/daterangepicker/daterangepicker.js') }}"></script>

<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('dashboard/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>

<!-- Summernote -->
<script src="{{ asset('dashboard/plugins/summernote/summernote-bs4.min.js') }}"></script>

<!-- overlayScrollbars -->
<script src="{{ asset('dashboard/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>

<!-- DataTables -->
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.semanticui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.9.2/semantic.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('/vendor/datatables/buttons.server-side.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.9.2/semantic.min.js"></script>

<!-- Select Element 2 -->
<script src="{{ asset('dashboard/plugins/select2/js/select2.full.min.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('dashboard/dist/js/adminlte.js') }}"></script>
<script src="{{ asset('dashboard/dist/js/pages/dashboard.js') }}"></script>


<script>
  $(function () {

      var donutChartCanvas = $('#pieChart').get(0).getContext('2d');
      var donutData = {
        labels: [
          'Data Penduduk',
          'Data Pendatang',
          'Data Pindah',
          'Data Kematian'
        ],
        datasets: [
          {
            @php
              $warga = \App\Models\Warga::count();
              $pendatang = \App\Models\Pendatang::count();
              $pindah = \App\Models\Pindah::count();
              $kematian = \App\Models\Kematian::count();
            @endphp
            data: [
              {{ $warga }},
              {{ $pendatang }},
              {{ $pindah }},
              {{ $kematian }}
            ],
            backgroundColor: ['#00c0ef', '#00a65a', '#f39c12', '#F31212'],
          }
        ]
      };
      var donutOptions = {
        maintainAspectRatio: false,
        responsive: true,
      };
      // Create pie or douhnut chart
      // You can switch between pie and douhnut using the method below.
      new Chart(donutChartCanvas, {
        type: 'pie',
        data: donutData,
        options: donutOptions
      });
    });
</script>


<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2(
      {
        theme: 'bootstrap4'
      });
      
      $('.select2').addclass('is-invalid');

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  })
</script>


{{-- datatable --}}
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
<script>
  new DataTable('#example', {
    columnDefs: [
      {
        targets: 0,
        className: 'dt-center'
      },
      {
        targets: 1,
        className: 'dt-center'
      },
      {
        targets: 2,
        className: 'dt-center'
      }
    ],
});
</script>