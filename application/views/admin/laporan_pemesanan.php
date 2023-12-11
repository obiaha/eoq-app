<div class="main-content container-fluid">
    <div class="page-title">
        <h3>Pelaporan</h3>
        <p class="text-subtitle text-muted">Print Laporan Pemesanan.</p>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-12">
                        <h4><b>Laporan Pemesanan</b></h4>
                    </div>
                </div>
                <hr>
            </div>
            <div class="card-body">
                <form action="<?= base_url('admin/pages?p=' . base64_encode('laporan_pemesanan')) ?>" method="post">
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
                <table class='table table-striped' id="tableLaporanPemesanan">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Surat Jalan</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Tanggal</th>
                            <th>Qty</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total = 0;
                        $periode1 = "";
                        $periode2 = "";
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $periode1 = $this->input->post('periode1');
                            $periode2 = $this->input->post('periode2');
                            $no = 1;
                            $pemesanan = $this->M_admin->getPemesanan($periode1, $periode2);
                            foreach ($pemesanan->result() as $dt) {
                                $total += $dt->qty;
                        ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $dt->surat_jalan ?></td>
                                    <td><?= $dt->id_barang ?></td>
                                    <td><?= $dt->nm_barang ?></td>
                                    <td><?= date('d-m-Y', strtotime($dt->tgl_record)) ?></td>
                                    <td><?= $dt->qty . " " . $dt->satuan ?></td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5" class="text-center"><b>Total</b></td>
                            <td><?= $total ?> Batang</td>
                        </tr>
                    </tfoot>
                </table>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <a href="<?= base_url('admin/printLaporanPemesanan?periode1=' . $periode1 . '&periode2=' . $periode2 . '') ?>" target="_blank" class="btn icon btn-primary col-md-12">
                            <i data-feather="printer" width="20"></i> Print Laporan Pemesanan
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    new DataTable('#tableLaporanPemesanan', {
        autoWidth: false,
        scrollX: true
    });
</script>