<?php
$periode1 = $this->input->get('periode1');
$periode2 = $this->input->get('periode2');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Laporan Persediaan</title>
    <style>
        body {
            font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
            font-size: 12px;
        }

        h3 {
            font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
            font-size: 25px;
            margin-bottom: 4px;
            text-align: center;
        }

        h4 {
            font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
            font-size: 20px;
            margin-bottom: 4px;
            text-align: center;
        }

        h5 {
            font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
            font-size: 15px;
            margin-bottom: 3px;
            text-align: center;
        }

        h6 {
            font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
            font-size: 12px;
            margin-bottom: 3px;
            text-align: center;
        }

        table {
            line-height: 1.6;
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            text-align: center;
            padding: 5px;
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <h4><u>LAPORAN PERSEDIAAN</u></h4>
    <h6 style="margin-top: -3px">Periode <?= date('d-m-Y', strtotime($periode1)) . " s.d " . date('d-m-Y', strtotime($periode2)) ?></h6>
    <br>
    <table>
        <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Satuan</th>
            <th>Pemesanan</th>
            <th>Pemakaian</th>
            <th>Sisa Stok</th>
        </tr>
        <?php
        $no = 1;
        $jml_pemesanan = 0;
        $jml_pemakaian = 0;
        $data_barang = $this->M_admin->getData('tbl_barang', 'id_barang');
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
        ?>
    </table>
</body>

</html>