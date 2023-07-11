<div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item {{ request()->is('/dashboard') ? 'active' : ''}}">
            <a class="nav-link" href="/dashboard">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
            <li class="nav-item {{ request()->is('/siswa') ? 'active' : ''}}">
                <a class="nav-link" href="/siswa">
                    <i class="icon-head menu-icon"></i>
                  <span class="menu-title">Data Siswa</span>
                </a>
              </li>
          </li>
          <li class="nav-item  {{ request()->is('/userfinger') ? 'active' : ''}}">
            <a class="nav-link" href="/userfinger">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Data User Fingerprint</span>
            </a>
          </li>
          <li class="nav-item  {{ request()->is('/fingerprint') ? 'active' : ''}}">
            <a class="nav-link" href="/fingerprint">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Data Presensi</span>
            </a>
          </li>
          <li class="nav-item  {{ request()->is('/perizinan') ? 'active' : ''}}">
            <a class="nav-link" href="/perizinan">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Data Perizinan</span>
            </a>
          </li>
          <li class="nav-item {{ request()->is('/rekap') ? 'active' : ''}}">
            <a class="nav-link" href="/rekap">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Laporan</span>
            </a>
          </li>
          <li class="nav-item {{ request()->is('/rekapsiswa') ? 'active' : ''}}">
            <a class="nav-link" href="/rekapsiswa">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Laporan Siswa</span>
            </a>
          </li>

        </ul>
     </nav>

      <!-- partial -->

      <!-- main-panel ends -->
		<!-- LEFT SIDEBAR -->

