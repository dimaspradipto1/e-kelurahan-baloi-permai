<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-success elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="{{ asset('/dashboard/dist/img/logo.png') }}" alt="Logo Kelurahan Baloi Permai"
      class="brand-image img-circle elevation-3" style="opacity: .7">
    <span class="brand-text font-weight-light">e-kelurahan Baloi Permai</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">

      {{-- <div class="image">
        <img src="{{ asset('/dashboard/dist/img/avatar5.png') }}" class="img-circle elevation-2" alt="User Image">
      </div> --}}
      <div class="info">
        <P class="d-block text-white text-wrap"><u>NAMA:</u></br> {{ Auth::user()->name }}</P>
        <p class="text-white"><u>Status:</u></br> <b>{{ Auth::user()->roles }}</b></p>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item menu-open">
          <a href="{{ route('admin') }}" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>

        @if(auth()->user()->roles == 'PU')
        <li class="nav-header">WARGA</li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Data Warga
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('warga.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Warga</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('pindah.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Pindah</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('pindah_wilayah.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Pindah Dalam Wilayah</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('pendatang.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Pendatang</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('kematian.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Kematian</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('pernikahan.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Pernikahan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('ahli-waris.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Ahli Waris</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('surat-keterangan.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Surat Keterangan</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ route('ketua-rt-rw.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Daftar Ketua rt/rw</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('sembako.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Penerima Sembako</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="{{ route('logout') }}" class="nav-link">
            <i class="fa-solid fa-right-from-bracket"></i>
            <p class="text">Log out</p>
          </a>
        </li>
        @endif

        @if(auth()->user()->roles == 'ADMIN')
        <li class="nav-header">WARGA</li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Data Warga
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('warga.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Warga</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('pindah.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Pindah</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('pindah_wilayah.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Pindah Dalam Wilayah</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('pendatang.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Pendatang</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('kematian.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Kematian</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('pernikahan.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Pernikahan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('ahli-waris.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Ahli Waris</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('surat-keterangan.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Surat Keterangan</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ route('ketua-rt-rw.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Daftar Ketua rt/rw</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('sembako.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Penerima Sembako</p>
              </a>
            </li>
          </ul>
        </li>


        {{-- <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-house-user"></i>
            <p>
              Data Pengelolah
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('pindah.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Pindah</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('pendatang.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Pendatang</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('kematian.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Kematian</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('pernikahan.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Pernikahan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('ahli-waris.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Ahli Waris</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('surat-keterangan.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Surat Keterangan</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ route('ketua-rt-rw.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Daftar Ketua rt/rw</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('sembako.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Penerima Sembako</p>
              </a>
            </li>
          </ul>
        </li> --}}

        <li class="nav-header">PMKS</li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fa-solid fa-hands-holding-child"></i>
            <p>
              Data PMKS
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('balita-terlantar.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Balita Terlantar</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('anak-terlantar.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Anak Terlantar</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('anak-hukum.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Anak Berhadapan Dengan Hukum</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('jalanan.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Anak Jalanan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('adk.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Anak dengan Kedisabilitasan (ADK)</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('anak-kekerasan.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Anak Korban Tindakan Kekerasan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('anak-khusus.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Anak Perlindungan Khusus</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('terlantar.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Lanjut Usia Terlantar</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('disabilitas.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Penyandang Disabilitas</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('susila.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Tuna Susila</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('gelandangan.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Gelandangan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('pengemis.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Pengemis</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('pemulung.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Pemulung</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('minoritas.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Kelompok Minoritas</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('bwblp.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Warga Binaan (BWBLP)</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('odha.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data HIV/AIDS (ODHA)</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('napza.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Korban NAPZA</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('traficking.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Korban Trafficking</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('kekerasan.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Korban Tindak Kekerasan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('pmbs.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Pekerja Migran Bermasalah Sosial (PMBS)</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('bencana-alam.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Korban Bencana Alam</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('bencana-sosial.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Korban Bencana Sosial</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('prse.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Perumpuan Rawan Sosial Ekonomi (PRSE)</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('fakir-miskin.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Fakir Miskin</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('kbsp.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>DATA Keluarga bermasalah Sosial Psikologi (KBSP)</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('panti-asuhan.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Panti Asuhan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('tahfiz.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Tahfiz</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('dhuafa.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Dhuafa</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('posyandu.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Posyandu</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-header">PEMERINTAH</li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fa-solid fa-landmark-flag"></i>
            <p>
              DATA BANGUNAN
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('fasum.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Fasum</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('masjid.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Masjid</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('gereja.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Gereja</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('sekolah.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Sekolah</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('fasilitas-olahraga.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Fasilitas Olahraga</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-header">PSKS</li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fa-solid fa-hand-holding-heart"></i>
            <p>
              DATA PSKS
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('pekerja-sosial-profesional.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Pekerja Sosial (Profesional)</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('pekerja-sosial-masyarakat.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Pekerja Sosial Masyarakat (PSM)</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('tagana.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Taruna Siaga bencana (TAGANA)</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('lks.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Lembaga Kesejahteraan Sosial (LKS)</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('karang-taruna.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Karang Taruna</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('lk3.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Lembaga Konsultasi Kesejahteraan Keluarga (LK3)</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('pioner.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Keluarga Pioner</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('tksk.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Tenaga Kesejahteraan Sosial Kecamatan (TKSK)</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('wksbm.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Wahana Kesejahteraan Sosial Keluarga Berbasis Masyarakat (WKSBM)</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('wpks.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Wanita Pemimpin Kesejahteraan Sosial</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('penyuluh-sosial.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Penyuluh Sosial</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('dunia-usaha.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Dunia Usaha</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-header">AUTH</li>
        <li class="nav-item">
          <a href="{{ route('users.index') }}" class="nav-link">
            <i class="fa-solid fa-user"></i>
            <p class="text">Users</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('logout') }}" class="nav-link">
            <i class="fa-solid fa-right-from-bracket"></i>
            <p class="text">Log out</p>
          </a>
        </li>
        @endif

        @if (auth()->user()->roles== 'PMKS')
        <li class="nav-header">PMKS</li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fa-solid fa-hands-holding-child"></i>
            <p>
              Data PMKS
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('balita-terlantar.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Balita Terlantar</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('anak-terlantar.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Anak Terlantar</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('anak-hukum.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Anak Berhadapan Dengan Hukum</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('jalanan.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Anak Jalanan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('adk.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Anak dengan Kedisabilitasan (ADK)</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('anak-kekerasan.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Anak Korban Tindakan Kekerasan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('anak-khusus.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Anak Perlindungan Khusus</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('terlantar.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Lanjut Usia Terlantar</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('disabilitas.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Penyandang Disabilitas</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('susila.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Tuna Susila</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('gelandangan.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Gelandangan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('pengemis.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Pengemis</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('pemulung.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Pemulung</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('minoritas.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Kelompok Minoritas</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('bwblp.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Warga Binaan (BWBLP)</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('odha.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data HIV/AIDS (ODHA)</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('napza.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Korban NAPZA</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('traficking.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Korban Trafficking</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('kekerasan.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Korban Tindak Kekerasan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('pmbs.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Pekerja Migran Bermasalah Sosial (PMBS)</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('bencana-alam.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Korban Bencana Alam</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('bencana-sosial.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Korban Bencana Sosial</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('prse.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Perumpuan Rawan Sosial Ekonomi (PRSE)</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('fakir-miskin.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Fakir Miskin</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('kbsp.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Keluarga bermasalah Sosial Psikologi (KBSP)</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('panti-asuhan.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Panti Asuhan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('tahfiz.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Tahfiz</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('dhuafa.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Dhuafa</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('posyandu.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Posyandu</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="{{ route('logout') }}" class="nav-link">
            <i class="fa-solid fa-right-from-bracket"></i>
            <p class="text">Log out</p>
          </a>
        </li>

        @endif

        @if(auth()->user()->roles == 'PSKS')
        <li class="nav-header">PSKS</li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fa-solid fa-hand-holding-heart"></i>
            <p>
              DATA PSKS
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('pekerja-sosial-profesional.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Pekerja Sosial (Profesional)</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('pekerja-sosial-masyarakat.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Pekerja Sosial Masyarakat (PSM)</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ Route('tagana.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Taruna Siaga bencana (TAGANA)</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('lks.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Lembaga Kesejahteraan Sosial (LKS)</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('karang-taruna.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Karang Taruna</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('lk3.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Lembaga Konsultasi Kesejahteraan Keluarga (LK3)</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('pioner.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Keluarga Pioner</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('tksk.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Tenaga Kesejahteraan Sosial Kecamatan (TKSK)</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('wksbm.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Wahana Kesejahteraan Sosial Keluarga Berbasis Masyarakat (WKSBM)</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('wpks.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Wanita Pemimpin Kesejahteraan Sosial</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('penyuluh-sosial.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Penyuluh Sosial</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('dunia-usaha.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Dunia Usaha</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="{{ route('logout') }}" class="nav-link">
            <i class="fa-solid fa-right-from-bracket"></i>
            <p class="text">Log out</p>
          </a>
        </li>
        @endif

        @if (auth()->user()->roles == 'WARGA')
        <li class="nav-item">
          <a href="{{ route('logout') }}" class="nav-link">
            <i class="fa-solid fa-right-from-bracket"></i>
            <p class="text">Log out</p>
          </a>
        </li>
        @endif

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>