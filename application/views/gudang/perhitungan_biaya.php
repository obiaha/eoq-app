<div class="main-content container-fluid">
    <div class="page-title">
        <h3>Perhitungan</h3>
        <p class="text-subtitle text-muted">Menampilkan semua perhitungan biaya persediaan.</p>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-12">
                        <h4><b>Data Perhitungan Biaya Persediaan</b></h4>
                    </div>
                </div>
                <hr>
            </div>
            <div class="card-body">
                <form action="<?= base_url('gudang/pages?p=' . base64_encode('perhitungan_biaya')) ?>" method="post">
                    <div class="row">
                        <div class="col-md-2">
                            <label>Pilih Barang</label>
                        </div>
                        <div class="col-md-2">
                            <select class="form-select" name="id_barang">
                                <option value=""></option>

                                <?php
                                foreach ($data_barang->result() as $dt) {
                                ?>
                                    <option value="<?= $dt->id_barang ?>"><?= $dt->id_barang . " - " . $dt->nm_barang ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
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
                            <th>Biaya Persediaan</th>
                            <th>Frekuensi</th>
                            <th>Durasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $id = $this->input->post('id_barang');
                            $periode1 = $this->input->post('periode1');
                            $periode2 = $this->input->post('periode2');
                            $getPemakaian = $this->M_gudang->getPemakaian($id, $periode1, $periode2)->result();
                            $no = 1;
                            foreach ($getPemakaian as $dt) {
                                $getBarang = $this->M_gudang->getWhere('tbl_barang', array('id_barang' => $dt->id_barang))->row();
                        ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $dt->id_barang ?></td>
                                    <td><?= $getBarang->nm_barang ?></td>
                                    <td><?= $dt->total ?></td>
                                    <td><?= $dt->total ?></td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
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