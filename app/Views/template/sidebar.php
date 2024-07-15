<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
    <div class="sidebar-brand-icon">
       <img src="<?= base_url('img/logo.png') ?>" style="width: 50px; height:50px" alt="" >
    </div>
    <div class="sidebar-brand-text mx-3">PAUS.id</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0 mb-2">

<!-- Heading -->
<div class="sidebar-heading">
    Menu
</div>

<!-- Nav Item - Dashboard -->
<li class="nav-item">
    <a class="nav-link" href="/'>
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>



<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pengaduan"
        aria-expanded="true" aria-controls="pengaduan">
        <i class="fas fa-fw fa-calendar"></i>
        <span>Pengaduan</span>
    </a>
    <div id="pengaduan" class="collapse" aria-labelledby="PengaduanOne" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="/dashboard">Daftar Pengaduan</a>
            <!-- <a class="collapse-item" href="">Baru</a>
            <a class="collapse-item" href="">Diproses</a> -->
            <a class="collapse-item" href="/gambar">Gambar</a>
            <a class="collapse-item" href="/grafik">Grafik</a>
            <a class="collapse-item" href="/login">Selesai</a>
        </div>
    </div>
</li>


<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->
