<div class="main-content container-fluid">
    <div class="page-title">
        <h3>Master Data</h3>
        <p class="text-subtitle text-muted">Menampilkan semua data supplier.</p>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-3">
                        <h4><b>Data Supplier</b></h4>
                    </div>
                    <div class="col-6">
                    </div>
                    <div class="col-3">
                        <button type="button" class="btn icon btn-success" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" style="float: right;">
                            <i data-feather="plus" width="20"></i> Supplier
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
                                    <form class="form form-vertical" action="<?= base_url('gudang/insertSupplier') ?>" method="post">
                                        <div class="modal-body">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label>Nama Supplier</label>
                                                            <input type="text" class="form-control" name="nm_supplier">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label>Alamat</label>
                                                            <textarea class="form-control" name="alamat" rows="3"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label>No. Telepon</label></label>
                                                            <input type="number" class="form-control" name="telepon">
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
                <table class='table table-striped' id="table_supplier">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Supplier</th>
                            <th>Nama Supplier</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data_supplier->result() as $dt) {
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $dt->id_supplier ?></td>
                                <td><?= $dt->nm_supplier ?></td>
                                <td><?= $dt->alamat ?></td>
                                <td><?= $dt->telepon ?></td>
                                <td>
                                    <div class="row">
                                        <div class="col-4">
                                            <button type="button" class="btn icon btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalCenter<?= $dt->id_supplier ?>">
                                                <i data-feather="edit" width="20"></i>
                                            </button>
                                            <div class="modal fade" id="exampleModalCenter<?= $dt->id_supplier ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-primary">
                                                            <h5 class="modal-title white" id="exampleModalCenterTitle">Ubah Data</h5>
                                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                <i data-feather="x"></i>
                                                            </button>
                                                        </div>
                                                        <form class="form form-vertical" action="<?= base_url('gudang/updateSupplier') ?>" method="post">
                                                            <div class="modal-body">
                                                                <div class="form-body">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label>Kode</label>
                                                                                <input type="text" class="form-control" value="<?= $dt->id_supplier ?>" disabled>
                                                                                <input type="hidden" class="form-control" name="id_supplier" value="<?= $dt->id_supplier ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label>Nama Supplier</label>
                                                                                <input type="text" class="form-control" name="nm_supplier" value="<?= $dt->nm_supplier ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label>Alamat</label>
                                                                                <textarea class="form-control" name="alamat" rows="3"><?= $dt->alamat ?></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label>No. Telepon</label></label>
                                                                                <input type="number" class="form-control" name="telepon" value="<?= $dt->telepon ?>">
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
                                            <form action="<?= base_url('gudang/deleteSupplier') ?>" method="post">
                                                <input type="hidden" class="form-control" name="id_supplier" value="<?= $dt->id_supplier ?>">
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
    new DataTable('#table_supplier', {
        autoWidth: false,
        scrollX: true
    });
</script>