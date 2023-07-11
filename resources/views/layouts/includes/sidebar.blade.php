<div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item {{ request()->is('/') ? 'active' : ''}}">
            <a class="nav-link" href="/">
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
          <li class="nav-item  {{ request()->is('/fingerprint') ? 'active' : ''}}">
            <a class="nav-link" href="#">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Data Fingerprint</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Upload Fingerprint</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Pengaturan Mesin</span>
            </a>
          </li>
        </ul>
     </nav>

      <!-- partial -->

      <!-- main-panel ends -->
		<!-- LEFT SIDEBAR -->
f
