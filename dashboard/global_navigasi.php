<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <?php 
        if ($level === 'GURU'){ ?>
        <li class="nav-item">
            <a href="guru" class="nav-link <?php if($halaman == 'Peminjaman Guru') echo"active" ?>">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Peminjaman
                </p>
            </a>
        </li>
        <?php } else { ?>
        <li class="nav-item has-treeview menu-open">
            <a href="index" class="nav-link <?php if($halaman == 'dashboard') echo"active" ?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li>

        <li
            class="nav-item has-treeview <?php if($halaman == 'barang' or $halaman == 'Tambah Barang' or $halaman == 'uploadfoto' or $halaman == 'profil' or $halaman == 'anggota' or $halaman == 'Tambah Anggota') echo 'menu-open'?>">
            <a href="#"
                class="nav-link <?php if($halaman == 'barang' or $halaman == 'Tambah Barang' or $halaman == 'uploadfoto' or $halaman == 'profil' or $halaman == 'anggota' or $halaman == 'Tambah Anggota') echo "active" ?>">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Data Master
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="barang"
                        class="nav-link <?php if($halaman == 'barang' or $halaman == 'Tambah Barang') echo "active" ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Data Barang</p>
                    </a>
                    <a href="anggota"
                        class="nav-link <?php if($halaman == 'anggota' or $halaman == 'Tambah Anggota') echo "active" ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Data Anggota</p>
                    </a>
                    <!-- <a href="uploadfoto" class="nav-link <?php if($halaman == 'uploadfoto') echo "active" ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Upload Foto</p>
                    </a>
                    <a href="setting" class="nav-link <?php if($halaman == 'setting') echo "active" ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Ubah Password</p>
                    </a> -->
                </li>
            </ul>
        </li>
        <li
            class="nav-item has-treeview <?php if($halaman == 'Transaksi' or $halaman == 'Transaksi Barang Masuk' or $halaman == 'Transaksi Barang Keluar' or $halaman == 'Tambah Barang Keluar') echo 'menu-open'?>">
            <a href="#"
                class="nav-link <?php if($halaman == 'Transaksi' or $halaman == 'Transaksi Barang Masuk' or $halaman == 'Transaksi Barang Keluar' or $halaman == 'Tambah Barang Keluar') echo "active" ?>">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Data Transaksi
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="barangkeluar"
                        class="nav-link <?php if($halaman == 'Transaksi Barang Keluar' or $halaman == 'Tambah Barang Keluar') echo "active" ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Peminjaman</p>
                    </a>
                    <a href="barangmasuk"
                        class="nav-link <?php if($halaman == 'Transaksi Barang Masuk') echo "active" ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Pengembalian</p>
                    </a>
                </li>
            </ul>
        </li>
        <?php }?>

        <?php 
        if ($level === 'Administrator'){ ?>
        <li class="nav-item">
            <a href="users" class="nav-link <?php if($halaman == 'Manajemen Users') echo"active" ?>">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Manajemen User
                </p>
            </a>
        </li>
        <?php } else { 
        }
        ?>


        <?php
if($level === 'GURU'){ ?>
        <li
            class="nav-item has-treeview <?php if($halaman == 'setting' or $halaman == 'uploadfoto' or $halaman == 'profil') echo 'menu-open'?>">
            <a href="#"
                class="nav-link <?php if($halaman == 'setting' or $halaman == 'uploadfoto' or $halaman == 'profil') echo "active" ?>">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Pengaturan
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="profil" class="nav-link <?php if($halaman == 'profil') echo "active" ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Profil Guru</p>
                    </a>
                    <a href="uploadfoto" class="nav-link <?php if($halaman == 'uploadfoto') echo "active" ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Upload Foto</p>
                    </a>
                    <a href="setting" class="nav-link <?php if($halaman == 'setting') echo "active" ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Ubah Password</p>
                    </a>
                </li>
            </ul>
        </li>
        <?php }else{ ?>
        <li
            class="nav-item has-treeview <?php if($halaman == 'setting' or $halaman == 'uploadfoto' or $halaman == 'profil') echo 'menu-open'?>">
            <a href="#"
                class="nav-link <?php if($halaman == 'setting' or $halaman == 'uploadfoto' or $halaman == 'profil') echo "active" ?>">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Pengaturan
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="profil" class="nav-link <?php if($halaman == 'profil') echo "active" ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Profil</p>
                    </a>
                    <a href="uploadfoto" class="nav-link <?php if($halaman == 'uploadfoto') echo "active" ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Upload Foto</p>
                    </a>
                    <a href="setting" class="nav-link <?php if($halaman == 'setting') echo "active" ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Ubah Password</p>
                    </a>
                </li>
            </ul>
        </li>
        <?php } ?>

        <?php 
        if ($level === 'Administrator'){ ?>
        <li
            class="nav-item has-treeview <?php if($halaman == 'database' or $halaman == 'Import' or $halaman == 'Export' or $halaman == 'Hapus Tabel/Datbase') echo 'menu-open'?>">
            <a href="#"
                class="nav-link <?php if($halaman == 'database' or $halaman == 'Import' or $halaman == 'Export' or $halaman == 'Hapus Tabel/Datbase') echo "active" ?>">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Database
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="import" class="nav-link <?php if($halaman == 'Import') echo "active" ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Import</p>
                    </a>
                    <a href="export" class="nav-link <?php if($halaman == 'Export') echo "active" ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Export</p>
                    </a>
                    <!-- <a href="hapusdatabase" class="nav-link <?php if($halaman == 'Hapus Tabel/Datbase') echo "active" ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Hapus Table</p>
                    </a> -->
                </li>
            </ul>
        </li>
        <?php } ?>

    </ul>
</nav>
<!-- /.sidebar-menu -->

</div>
<!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <!-- <h1 class="m-0 text-dark">Dashboard v3</h1> -->
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index">Home</a></li>
                        <li class="breadcrumb-item active"> <?php echo ucfirst($halaman); ?></li>
                    </ol>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->