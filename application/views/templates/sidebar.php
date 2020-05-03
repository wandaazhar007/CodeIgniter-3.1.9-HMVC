<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo base_url() ?>/assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo $this->session->userdata('name') ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <?php
            $data = $this->session->userdata('id');
            if ($data == 1) {
            ?>
                <li>
                    <a href="<?php echo base_url('dashboard') ?>">
                        <i class="fa fa-area-chart"></i> <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('transaksi') ?>">
                        <i class="fa fa-money"></i> <span>Transaksi</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="">
                        <i class="fa fa-gift"></i> <span>Produk</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo base_url('produk') ?>"><i class="fa fa-circle-o"></i>Data Produk</a></li>
                        <li><a href="<?php echo base_url('produk/kategori') ?>"><i class="fa fa-circle-o"></i>Kategori Produk</a></li>
                        <li><a href="<?php echo base_url('produk/satuan') ?>"><i class="fa fa-circle-o"></i>Satuan Produk</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="">
                        <i class="fa fa-database"></i> <span>Stok</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="active"><a href="<?php echo base_url('stok/masuk') ?>"><i class="fa fa-circle-o"></i>Stok Masuk</a></li>
                        <li><a href="<?php echo base_url('stok/keluar') ?>"><i class="fa fa-circle-o"></i>Stok Keluar</a></li>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo base_url('supplier') ?>">
                        <i class="fa fa-truck"></i> <span>Supplier</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('pelanggan') ?>">
                        <i class="fa fa-users"></i> <span>Pelanggan</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="">
                        <i class="fa fa-file"></i> <span>Laporan</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo base_url('laporan/penjualan') ?>"><i class="fa fa-circle-o"></i>Laporan Penjualan</a></li>
                        <li><a href="<?php echo base_url('laporan/stok_produk') ?>"><i class="fa fa-circle-o"></i>Laporan Stok Produk</a></li>
                        <li><a href="<?php echo base_url('laporan/stok_masuk') ?>"><i class="fa fa-circle-o"></i>Laporan Stok Masuk</a></li>
                        <li><a href="<?php echo base_url('laporan/stok_keluar') ?>"><i class="fa fa-circle-o"></i>Laporan Stok Keluar</a></li>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo base_url('settings') ?>">
                        <i class="fa fa-cogs"></i> <span>Settings</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('user') ?>">
                        <i class="fa fa-user"></i> <span>User</span>
                    </a>
                </li>
            <?php } ?>
            <?php
            if ($data == 2) {
            ?>
                <li>
                    <a href="<?php echo base_url('dasboard') ?>">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('transaksi') ?>">
                        <i class="fa fa-dashboard"></i> <span>Transaksi</span>
                    </a>
                </li>
            <?php } ?>


        </ul>
    </section>
    <!-- /.sidebar -->
</aside>