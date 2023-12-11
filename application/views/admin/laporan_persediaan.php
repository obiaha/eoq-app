<div class="main-content container-fluid">
    <div class="page-title">
        <h3>Pelaporan</h3>
        <p class="text-subtitle text-muted">Print Laporan Persediaan.</p>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-12">
                        <h4><b>Laporan Persediaan</b></h4>
                    </div>
                </div>
                <hr>
            </div>
            <div class="card-body">
                <form action="<?= base_url('admin/pages?p=' . base64_encode('laporan_persediaan')) ?>" method="post">
                    <div class="row">
                        <div class="col-md-2">
                            <label>Periode</label>
                        </div>
                        <div class="col-md-2 form-group">
                            <input type="date" class="form-control" name="periode1">
                        </div>
                        <div class="col-md-1 text-center">
                            s.d.
                        </div>
                        <div class="col-md-2 form-group">
                            <input type="date" class="form-control" name="periode2">
                        </div>

                        <div class="col-md-1">
                            <button type="submit" class="btn icon btn-primary">
                                <i data-feather="search" width="20"></i> Cari
                            </button>
                        </div>
                    </div>
                </form>
                <hr>
                <table class='table table-striped' id="tableLaporanPersediaan">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Satuan</th>
                            <th>Pemesanan</th>
                            <th>Pemakaian</th>
                            <th>Sisa Stok</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $periode1 = "";
                        $periode2 = "";
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $periode1 = $this->input->post('periode1');
                            $periode2 = $this->input->post('periode2');
                            $no = 1;
                            $jml_pemesanan = 0;
                            $jml_pemakaian = 0;
                            foreach ($data_barang->result() as $dt) {
                                $pemesanan = $this->M_admin->getWhere('tbl_pemesanan', array('id_barang' => $dt->id_barang));
                                $pemakaian = $this->M_admin->getWhere('tbl_pemakaian', array('id_barang' => $dt->id_barang));
                                if ($pemesanan->row() != null) {
                                    $jml_pemesanan += $pemesanan->num_rows();
                                } else {
                                    $jml_pemesanan = 0;
                                }
                                if ($pemakaian->row() != null) {
                                    $jml_pemakaian += $pemakaian->num_rows();
                                } else {
                                    $jml_pemakaian = 0;
                                }
                        ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $dt->id_barang ?></td>
                                    <td><?= $dt->nm_barang ?></td>
                                    <td><?= $dt->satuan ?></td>
                                    <td><?= $jml_pemesanan ?></td>
                                    <td><?= $jml_pemakaian ?></td>
                                    <td><?= $dt->stok ?></td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <a href="<?= base_url('admin/printLaporanPersediaan?periode1=' . $periode1 . '&periode2=' . $periode2 . '') ?>" target="_blank" class="btn icon btn-primary col-md-12">
                            <i data-feather="printer" width="20"></i> Print Laporan Persediaan
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    new DataTable('#tableLaporanPersediaan', {
        autoWidth: false,
        scrollX: true
    });
</script>