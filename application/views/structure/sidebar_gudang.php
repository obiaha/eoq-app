<body>
    <div id="app">
        <div id="sidebar" class='active'>
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <img src="<?= base_url('assets/images/logo.png') ?>" alt="" srcset="">
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class='sidebar-title'>Main Menu</li>
                        <li class="sidebar-item active ">
                            <a href="<?= base_url('gudang') ?>" class='sidebar-link'>
                                <i data-feather="home" width="20"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i data-feather="database" width="20"></i>
                                <span>Master Data</span>
                            </a>
                            <ul class="submenu ">
                                <li>
                                    <a href="<?= base_url('gudang/pages?p=' . base64_encode('data_supplier')) ?>">Data Supplier</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('gudang/pages?p=' . base64_encode('data_barang')) ?>">Data Barang</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i data-feather="list" width="20"></i>
                                <span>Transaksi</span>
                            </a>
                            <ul class="submenu ">
                                <li>
                                    <a href="<?= base_url('gudang/pages?p=' . base64_encode('transaksi_pemesanan')) ?>">Pemesanan Barang</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('gudang/pages?p=' . base64_encode('transaksi_pemakaian')) ?>">Pemakaian Barang</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i data-feather="sliders" width="20"></i>
                                <span>Perhitungan</span>
                            </a>
                            <ul class="submenu ">
                                <li>
                                    <a href="<?= base_url('gudang/pages?p=' . base64_encode('perhitungan_eoq')) ?>">Perhitungan EOQ</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('gudang/pages?p=' . base64_encode('perhitungan_biaya')) ?>">Penentuan Biaya Persediaan</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">