<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
    <a class="sidebar-brand" href="<?php echo e(route('admin.dashboard')); ?>">
        <img src="<?php echo e(asset('assets/img/icons/logo-desoresik.png')); ?>" alt="Logo 1" style="height: 30px;">
        <img src="<?php echo e(asset('assets/img/icons/logo-indramayu.png')); ?>" alt="Logo 2" style="height: 40px;">
        <div style="background: white; border-radius: 30px; padding: 2px; display: inline-block;">
            <img src="<?php echo e(asset('assets/img/photos/logo-klhk.png')); ?>" alt="Logo 3" style="height: 30px;">
        </div>

    </a>
        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Home
            </li>

            <li class="sidebar-item <?php echo e(request()->routeIs('admin.dashboard') ? 'active' : ''); ?>">
                <a class="sidebar-link" href="<?php echo e(route('admin.dashboard')); ?>">
                    <i class="align-middle" data-feather="grid"></i> 
                    <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-header">
                Layanan
            </li>

            <li class="sidebar-item <?php echo e(request()->routeIs('admin.petugas.index') ? 'active' : ''); ?> ">
                <a class="sidebar-link" href="<?php echo e(route('admin.petugas.index')); ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                    <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4"/>
                    </svg>
                    <span class="align-middle">Data Petugas</span>
                </a>
            </li>

            <li class="sidebar-item <?php echo e(request()->routeIs('admin.armada.index') ? 'active' : ''); ?> ">
                <a class="sidebar-link" href="<?php echo e(route('admin.armada.index')); ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-truck-front-fill" viewBox="0 0 16 16">
                <path d="M3.5 0A2.5 2.5 0 0 0 1 2.5v9c0 .818.393 1.544 1 2v2a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 .5-.5V14h6v1.5a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 .5-.5v-2c.607-.456 1-1.182 1-2v-9A2.5 2.5 0 0 0 12.5 0zM3 3a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v3.9c0 .625-.562 1.092-1.17.994C10.925 7.747 9.208 7.5 8 7.5s-2.925.247-3.83.394A1.008 1.008 0 0 1 3 6.9zm1 9a1 1 0 1 1 0-2 1 1 0 0 1 0 2m8 0a1 1 0 1 1 0-2 1 1 0 0 1 0 2m-5-2h2a1 1 0 1 1 0 2H7a1 1 0 1 1 0-2"/>
                </svg>
                    <span class="align-middle">Data Armada</span>
                </a>
            </li>

            <li class="sidebar-item <?php echo e(request()->routeIs('admin.tps.index') ? 'active' : ''); ?>">
                <a class="sidebar-link" href="<?php echo e(route('admin.tps.index')); ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-map" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15.817.113A.5.5 0 0 1 16 .5v14a.5.5 0 0 1-.402.49l-5 1a.5.5 0 0 1-.196 0L5.5 15.01l-4.902.98A.5.5 0 0 1 0 15.5v-14a.5.5 0 0 1 .402-.49l5-1a.5.5 0 0 1 .196 0L10.5.99l4.902-.98a.5.5 0 0 1 .415.103M10 1.91l-4-.8v12.98l4 .8zm1 12.98 4-.8V1.11l-4 .8zm-6-.8V1.11l-4 .8v12.98z"/>
                    </svg>
                    <span class="align-middle">Lokasi TPS</span>
                </a>
            </li>

            <li class="sidebar-item <?php echo e(request()->routeIs('admin.jadwal-pengangkutan') ? 'active' : ''); ?>">
                <a class="sidebar-link" href="<?php echo e(route('admin.jadwal-pengangkutan')); ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journals" viewBox="0 0 16 16">
                    <path d="M5 0h8a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2 2 2 0 0 1-2 2H3a2 2 0 0 1-2-2h1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1H1a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v9a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1H3a2 2 0 0 1 2-2"/>
                    <path d="M1 6v-.5a.5.5 0 0 1 1 0V6h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V9h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 2.5v.5H.5a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1H2v-.5a.5.5 0 0 0-1 0"/>
                    </svg>
                    <span class="align-middle">Jadwal Pengangkutan</span>
                </a>
            </li>

            <li class="sidebar-item <?php echo e(request()->routeIs('admin.laporan-kendala') ? 'active' : ''); ?>">
                <a class="sidebar-link" href="<?php echo e(route('admin.laporan-kendala')); ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-square-fill" viewBox="0 0 16 16">
                    <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm6 4c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995A.905.905 0 0 1 8 4m.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                    </svg>
                    <span class="align-middle">Laporan Kendala</span>
                </a>
            </li>
            <li class="sidebar-item <?php echo e(request()->routeIs('admin.absensi.index') ? 'active' : ''); ?>">
                <a class="sidebar-link" href="<?php echo e(route('admin.absensi.index')); ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16">
                        <path d="M15.854 5.146a.5.5 0 0 0-.708 0L11.5 8.793 10.354 7.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l4-4a.5.5 0 0 0 0-.708z"/>
                        <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm6-6a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                    </svg>
                    <span class="align-middle">Absensi</span>
                </a>
            </li>
</nav>
<?php /**PATH C:\laragon\www\project-desoresik\resources\views/layouts/partials-admin/sidebar.blade.php ENDPATH**/ ?>