<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('home');?>">
    <div class="sidebar-brand-icon ">
        <i class="fas fa-map-marker"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Test IT</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">


<!-- Heading -->
<?php echo cekMenu(session()) ?>
<!-- <li class="nav-item active">
    <a class="nav-link" href="<?= base_url('dashboard'); ?>" aria-expanded="false"
        aria-controls="collapsePages">
        <i class="fas fa-home"></i>
        <span>Dashboard</span>
    </a>
</li> -->


<!-- Nav Item - Pages Collapse Menu -->
<!-- <li class="nav-item active">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"  aria-expanded="false"
        aria-controls="collapsePages">
        <i class="fas fa-id-badge"></i>
        <span>Karyawan</span>
    </a>
    <div id="collapsePages" class="collapse show" aria-labelledby="headingPages"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Karyawan</h6>
            <a class="collapse-item" href="<?= base_url('karyawan'); ?>">Karyawan</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Cuti</h6>
            <a class="collapse-item" href="<?= base_url('cuti'); ?>">Karyawan Sedang Cuti</a>
            <a class="collapse-item" href="<?= base_url('sisa'); ?>">Sisa Cuti Karyawan</a>
        </div>
    </div>
</li> -->


<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->