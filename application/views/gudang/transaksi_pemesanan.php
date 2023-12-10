<div class="main-content container-fluid">
    <div class="page-title">
        <h3>Transaksi</h3>
        <p class="text-subtitle text-muted">Menampilkan semua transaksi pemesanan barang.</p>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-3">
                        <h4><b>Data Pemesanan Barang</b></h4>
                    </div>
                    <div class="col-6">
                    </div>
                    <div class="col-3">
                        <button type="button" class="btn icon btn-success" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" style="float: right;">
                            <i data-feather="plus" width="20"></i> Pemesanan
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
                                    <form class="form form-vertical" action="<?= base_url('gudang/insertPemesanan') ?>" method="post">
                                        <div class="modal-body">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label>Pilih Supplier</label>
                                                            <select class="form-select" name="id_supplier">
                                                                <option value=""></option>

                                                                <?php
                                                                foreach ($data_supplier->result() as $dt) {
                                                                ?>
                                                                    <option value="<?= $dt->id_supplier ?>"><?= $dt->id_supplier . " - " . $dt->nm_supplier ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label>Pilih Barang</label>
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
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label>Tanggal</label></label></label>
                                                            <input type="date" class="form-control" name="tanggal">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label>Qty</label></label></label>
                                                            <input type="number" class="form-control" name="qty">
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
                <table class='table table-striped' id="tablePemesanan">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Surat Jalan</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Tanggal</th>
                            <th>Qty</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($pemesanan->result() as $dt) {
                            $data_barang = $this->M_gudang->getWhere('tbl_barang', array('id_barang' => $dt->id_barang))->row();
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $dt->surat_jalan ?></td>
                                <td><?= $dt->id_barang ?></td>
                                <td><?= $data_barang->nm_barang ?></td>
                                <td><?= date('d-m-Y', strtotime($dt->tgl_record)) ?></td>
                                <td><?= $dt->qty . " " . $data_barang->satuan ?></td>
                                <td>
                                    <div class="row">
                                        <div class="col-4">
                                            <button type="button" class="btn icon btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalCenter<?= $dt->id_pemesanan ?>">
                                                <i data-feather="edit" width="20"></i>
                                            </button>
                                            <div class="modal fade" id="exampleModalCenter<?= $dt->id_pemesanan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-primary">
                                                            <h5 class="modal-title white" id="exampleModalCenterTitle">Ubah Data</h5>
                                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                <i data-feather="x"></i>
                                                            </button>
                                                        </div>
                                                        <form class="form form-vertical" action="<?= base_url('gudang/updatePemesanan') ?>" method="post">
                                                            <div class="modal-body">
                                                                <div class="form-body">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label>Nama Supplier</label>
                                                                                <select class="form-select" name="id_supplier">
                                                                                    <?php
                                                                                    $get_supplier = $this->M_gudang->getWhere('tbl_supplier', array('id_supplier' => $dt->id_supplier))->row();
                                                                                    ?>
                                                                                    <option value="<?= $get_supplier->id_supplier ?>"><?= $get_supplier->nm_supplier ?></option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label>Nama Barang</label>
                                                                                <select class="form-select" name="id_barang">
                                                                                    <?php
                                                                                    $get_barang = $this->M_gudang->getWhere('tbl_barang', array('id_barang' => $dt->id_barang))->row();
                                                                                    ?>
                                                                                    <option value="<?= $get_barang->id_barang ?>"><?= $get_barang->id_barang . ' - ' . $get_barang->nm_barang ?></option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label>Tanggal</label></label></label>
                                                                                <input type="text" class="form-control" name="tanggal" value="<?= date('d-m-Y', strtotime($dt->tanggal)) ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label>Qty</label></label></label>
                                                                                <input type="number" class="form-control" name="qty" value="<?= $dt->qty ?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class=" modal-footer">
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
                                            <form action="<?= base_url('gudang/deletePemesanan') ?>" method="post">
                                                <input type="hidden" class="form-control" name="id_pemesanan" value="<?= $dt->id_pemesanan ?>">
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
    new DataTable('#tablePemesanan', {
        autoWidth: false,
        scrollX: true
    });
</script>