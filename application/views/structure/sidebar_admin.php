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
                            <a href="<?= base_url('admin') ?>" class='sidebar-link'>
                                <i data-feather="home" width="20"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i data-feather="printer" width="20"></i>
                                <span>Pelaporan</span>
                            </a>
                            <ul class="submenu ">
                                <li>
                                    <a href="<?= base_url('admin/pages?p=' . base64_encode('laporan_pemesanan')) ?>">Laporan Pemesanan</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/pages?p=' . base64_encode('laporan_persediaan')) ?>">Laporan Persediaan</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/pages?p=' . base64_encode('laporan_eoq')) ?>">Laporan EOQ</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/pages?p=' . base64_encode('laporan_biaya')) ?>">Laporan Biaya Persediaan</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">