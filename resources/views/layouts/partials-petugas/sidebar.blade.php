<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
    <a class="sidebar-brand" href="{{ route('petugas.dashboard') }}">
        <img src="{{ asset('assets/img/icons/logo-desoresik.png') }}" alt="Logo 1" style="height: 30px;">
        <img src="{{ asset('assets/img/icons/logo-indramayu.png') }}" alt="Logo 2" style="height: 40px;">
        <img src="{{ asset('assets/img/photos/dlh.jpg') }}" alt="Logo 3" style="height: 40px;">
    </a>
        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Home
            </li>

            <li class="sidebar-item {{ request()->routeIs('petugas.dashboard.index') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('petugas.dashboard.index') }}">
                    <i class="align-middle" data-feather="grid"></i> 
                    <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-header">
                Layanan
            </li>

            <li class="sidebar-item {{ request()->routeIs('petugas.tps.index') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('petugas.tps.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-map" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15.817.113A.5.5 0 0 1 16 .5v14a.5.5 0 0 1-.402.49l-5 1a.5.5 0 0 1-.196 0L5.5 15.01l-4.902.98A.5.5 0 0 1 0 15.5v-14a.5.5 0 0 1 .402-.49l5-1a.5.5 0 0 1 .196 0L10.5.99l4.902-.98a.5.5 0 0 1 .415.103M10 1.91l-4-.8v12.98l4 .8zm1 12.98 4-.8V1.11l-4 .8zm-6-.8V1.11l-4 .8v12.98z"/>
                    </svg>
                    <span class="align-middle">Lokasi TPS</span>
                </a>
            </li>

            <li class="sidebar-item {{ request()->routeIs('petugas.jadwal-pengangkutan.index') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('petugas.jadwal-pengangkutan.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journals" viewBox="0 0 16 16">
                    <path d="M5 0h8a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2 2 2 0 0 1-2 2H3a2 2 0 0 1-2-2h1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1H1a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v9a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1H3a2 2 0 0 1 2-2"/>
                    <path d="M1 6v-.5a.5.5 0 0 1 1 0V6h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V9h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 2.5v.5H.5a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1H2v-.5a.5.5 0 0 0-1 0"/>
                    </svg>
                    <span class="align-middle">Jadwal Pengangkutan</span>
                </a>
            </li>

            <li class="sidebar-item {{ request()->routeIs('petugas.kendala.index') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('petugas.kendala.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-square-fill" viewBox="0 0 16 16">
                    <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm6 4c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995A.905.905 0 0 1 8 4m.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                    </svg>
                    <span class="align-middle">Laporan Kendala</span>
                </a>
            </li>
            <li class="sidebar-item {{ request()->routeIs('petugas.absensi.index') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('petugas.absensi.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16">
                        <path d="M15.854 5.146a.5.5 0 0 0-.708 0L11.5 8.793 10.354 7.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l4-4a.5.5 0 0 0 0-.708z"/>
                        <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm6-6a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                    </svg>
                    <span class="align-middle">Absensi</span>
                </a>
            </li>
</nav>
