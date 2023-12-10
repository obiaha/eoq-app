<div class="main-content container-fluid">
    <div class="page-title">
        <h3>Master Data</h3>
        <p class="text-subtitle text-muted">Menampilkan semua data barang.</p>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-3">
                        <h4><b>Data Barang</b></h4>
                    </div>
                    <div class="col-6">
                    </div>
                    <div class="col-3">
                        <button type="button" class="btn icon btn-success" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" style="float: right;">
                            <i data-feather="plus" width="20"></i> Barang
                        </button>
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-success">
                                        <h5 class="modal-title white" id="exampleModalCenterTitle">Tambah Data</h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <i data-feather="x"></i>
                                        </button>
                                    </div>
                                    <form class="form form-vertical" action="<?= base_url('gudang/insertBarang') ?>" method="post">
                                        <div class="modal-body">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label>Nama Barang</label>
                                                            <input type="text" class="form-control" name="nm_barang">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label>Satuan</label>
                                                            <select class="form-select" name="satuan">
                                                                <option value=""></option>
                                                                <option value="Batang">Batang</option>
                                                                <option value="Pcs">Pcs</option>
                                                                <option value="Buah">Buah</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label>Harga Beli</label></label></label>
                                                            <input type="number" class="form-control" name="harga_beli">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label>Stok</label></label></label>
                                                            <input type="number" class="form-control" name="stok">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">Tutup</span>
                                            </button>
                                            <button type="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                                                <i class="bx bx-check d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">Simpan Data</span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
            <div class="card-body">
                <table class='table table-striped' id="tableBarang">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Satuan</th>
                            <th>Harga Beli</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data_barang->result() as $dt) {
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $dt->id_barang ?></td>
                                <td><?= $dt->nm_barang ?></td>
                                <td><?= $dt->satuan ?></td>
                                <td>Rp. <?= $dt->harga_beli ?></td>
                                <td><?= $dt->stok ?></td>
                                <td>
                                    <div class="row">
                                        <div class="col-4">
                                            <button type="button" class="btn icon btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalCenter<?= $dt->id_barang ?>">
                                                <i data-feather="edit" width="20"></i>
                                            </button>
                                            <div class="modal fade" id="exampleModalCenter<?= $dt->id_barang ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-primary">
                                                            <h5 class="modal-title white" id="exampleModalCenterTitle">Ubah Data</h5>
                                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                <i data-feather="x"></i>
                                                            </button>
                                                        </div>
                                                        <form class="form form-vertical" action="<?= base_url('gudang/updateBarang') ?>" method="post">
                                                            <div class="modal-body">
                                                                <div class="form-body">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label>Kode</label>
                                                                                <input type="text" class="form-control" value="<?= $dt->id_barang ?>" disabled>
                                                                                <input type="hidden" class="form-control" name="id_barang" value="<?= $dt->id_barang ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label>Nama Barang</label>
                                                                                <input type="text" class="form-control" name="nm_barang" value="<?= $dt->nm_barang ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label>Satuan</label>
                                                                                <select class="form-select" name="satuan">
                                                                                    <?php
                                                                                    if ($dt->satuan == "Batang") {
                                                                                        $b = "selected";
                                                                                        $p = "";
                                                                                        $h = "";
                                                                                    } elseif ($dt->satuan == "Pcs") {
                                                                                        $b = "";
                                                                                        $p = "selected";
                                                                                        $h = "";
                                                                                    } elseif ($dt->satuan == "Buah") {
                                                                                        $b = "";
                                                                                        $p = "";
                                                                                        $h = "selected";
                                                                                    } else {
                                                                                        $b = "selected";
                                                                                        $p = "";
                                                                                        $h = "";
                                                                                    }
                                                                                    ?>
                                                                                    <option value="Batang" <?= $b ?>>Batang</option>
                                                                                    <option value="Pcs" <?= $p ?>>Pcs</option>
                                                                                    <option value="Buah" <?= $h ?>>Buah</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label>Harga Beli</label></label></label>
                                                                                <input type="number" class="form-control" name="harga_beli" value="<?= $dt->harga_beli ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label>Stok</label></label></label>
                                                                                <input type="number" class="form-control" name="stok" value="<?= $dt->stok ?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                                    <span class="d-none d-sm-block">Tutup</span>
                                                                </button>
                                                                <button type="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                                    <span class="d-none d-sm-block">Simpan Perubahan</span>
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <form action="<?= base_url('gudang/deleteBarang') ?>" method="post">
                                                <input type="hidden" class="form-control" name="id_barang" value="<?= $dt->id_barang ?>">
                                                <button type="submit" class="btn icon btn-danger" onclick="confirm('Anda Yakin?')">
                                                    <i data-feather="trash-2" width="20"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
<script>
    new DataTable('#tableBarang', {
        autoWidth: false,
        scrollX: true
    });
</script>