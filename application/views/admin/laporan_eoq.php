<div class="main-content container-fluid">
    <div class="page-title">
        <h3>Pelaporan</h3>
        <p class="text-subtitle text-muted">Print Laporan EOQ.</p>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-12">
                        <h4><b>Laporan EOQ</b></h4>
                    </div>
                </div>
                <hr>
            </div>
            <div class="card-body">
                <form action="<?= base_url('admin/pages?p=' . base64_encode('laporan_eoq')) ?>" method="post">
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
                <table class='table table-striped' id="tableEoq">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Pemakaian (D)</th>
                            <th>Biaya Pemesanan (S)</th>
                            <th>Biaya Penyimpanan (H)</th>
                            <th>Hasil EOQ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $periode1 = "";
                        $periode2 = "";
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $id = $this->input->post('id_barang');
                            $periode1 = $this->input->post('periode1');
                            $periode2 = $this->input->post('periode2');
                            $getPemakaian = $this->M_admin->getPemakaian($periode1, $periode2)->result();
                            $no = 1;
                            foreach ($getPemakaian as $dt) {
                                $getBarang = $this->M_admin->getWhere('tbl_barang', array('id_barang' => $dt->id_barang))->row();
                                $d = $dt->total;
                                $s = 10000;
                                $h = 2000;
                                $eoq = 2 * $d * $s / $h;
                        ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $dt->id_barang ?></td>
                                    <td><?= $getBarang->nm_barang ?></td>
                                    <td><?= $d ?></td>
                                    <td>Rp. <?= $s ?></td>
                                    <td>Rp. <?= $h ?></td>
                                    <td><?= $eoq ?></td>
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
                        <a href="<?= base_url('admin/printLaporanEoq?periode1=' . $periode1 . '&periode2=' . $periode2 . '') ?>" target="_blank" class="btn icon btn-primary col-md-12">
                            <i data-feather="printer" width="20"></i> Print Laporan EOQ
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    new DataTable('#tableEoq', {
        autoWidth: false,
        scrollX: true
    });
    $('#dateRange').daterangepicker();
</script>