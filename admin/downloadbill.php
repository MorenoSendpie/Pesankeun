<?php
function harga($angka)
{
    $hasilharga = "Rp " . number_format($angka, 2, ',', '.');
    return $hasilharga;
}
include('../koneksi.php');
function tanggal($tgl)
{
    $tanggal = substr($tgl, 8, 2);
    $bulan = bulan(substr($tgl, 5, 2));
    $tahun = substr($tgl, 0, 4);
    return $tanggal . ' ' . $bulan . ' ' . $tahun;
}
function bulan($bln)
{
    switch ($bln) {
        case 1:
            return "Januari";
            break;
        case 2:
            return "Februari";
            break;
        case 3:
            return "Maret";
            break;
        case 4:
            return "April";
            break;
        case 5:
            return "Mei";
            break;
        case 6:
            return "Juni";
            break;
        case 7:
            return "Juli";
            break;
        case 8:
            return "Agustus";
            break;
        case 9:
            return "September";
            break;
        case 10:
            return "Oktober";
            break;
        case 11:
            return "November";
            break;
        case 12:
            return "Desember";
            break;
    }
}
$idpem = $_GET["id"];
$ambil = $koneksi->query("SELECT*FROM pembelian
WHERE pembelian.idpembelian='$_GET[id]'");
$data = $ambil->fetch_assoc();
?>
    <html>

    <head>
        <title>Bill Pesankeun</title>
        <style>
            @page {
                margin: 3mm;
            }
        </style>
        <style>
            hr {
                display: block;
                margin-top: 0.5em;
                margin-bottom: 0.5em;
                margin-left: auto;
                margin-right: auto;
                border-style: inset;
                border-width: 1px;
            }
        </style>
    </head>

    <body style='font-family:tahoma; font-size:8pt;padding-top:50px'>
        <table style='width:750; font-size:16pt; font-family:calibri; border-collapse: collapspe;' border='0'>
            <tr>
                <td align="center">
                    <center>
                        <font size="6"><b>Pesankeun</b></font><br>
                       </font><br>
                    </center>
                </td>
            </tr>
        </table>
        <br>
        <br>
        <hr style="border-top: 1px solid black;width:660">
        <br>
        <center>
            <table style='width:660; font-size:12pt; font-family:calibri; border-collapse: collapse;' border='0'>
                <tbody>
                    <tr>
                        <td>No.</td>
                        <td>: <?php echo $data['notransaksi']; ?></td>
                    </tr>
                    <tr>
                        <td>Nama.</td>
                        <td>: <?php echo $data['nama']; ?></td>
                    </tr>
                    <tr>
                        <td>No. HP</td>
                        <td>: <?php echo $data['nohp']; ?></td>
                    </tr>
                    <tr>
                        <td>No. Meja</td>
                        <td>: <?php echo $data['nomeja']; ?></td>
                    </tr>
                    <tr>
                        <td>Waktu</td>
                        <td>: <?= tanggal(date("Y-m-d", strtotime($data['waktu']))) . ' ' . date("H:i", strtotime($data['waktu'])); ?></td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>: <?php echo $data['status']; ?></td>
                    </tr>
                    <tr>
                        <td>Grandtotal</td>
                        <td>: <?php echo harga($data['grandtotal']); ?></td>
                    </tr>
                </tbody>
            </table>
            <br><br>
            <table cellspacing='0' cellpadding='0' style='width:660; font-size:12pt; font-family:calibri; border-collapse: collapse;' border='0'>
                <thead>
                    <tr>
                        <th style="padding:5px;margin:5px">No</th>
                        <th width="40%">Nama Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1; ?>
                    <?php $ambildetail = $koneksi->query("SELECT * FROM pembeliandetail WHERE idpembelian='$_GET[id]'"); ?>
                    <?php while ($detail = $ambildetail->fetch_assoc()) { ?>
                        <tr>
                            <td align="center"><?php echo $nomor; ?></td>
                            <td align="center"><?php echo $detail['namaproduk']; ?></td>
                            <td align="left">&nbsp;&nbsp;<?php echo harga($detail['hargaproduk']); ?></td>
                            <td align="center"><?php echo $detail['jumlah']; ?></td>
                            <td align="left">&nbsp;&nbsp;<?php echo harga($detail['subharga']); ?></td>
                        </tr>
                        <?php $nomor++; ?>
                    <?php } ?>
                    <tr>
                        <td colspan="4" style="text-align:right">Grandtotal : &nbsp;</b></em></td>
                        <td class="text-success">&nbsp;&nbsp;<?php echo harga($data['grandtotal']) ?></td>
                    </tr>
                </tbody>
            </table>
            <br><br>
            <table cellspacing='0' cellpadding='0' style='width:550px; font-size:11pt; font-family:calibri; border-collapse: collapse;'>
                <tr>
                    <td align="center" width="60">
                        <br><br><br><br>
                    </td>
                </tr>
            </table>
        </center>
    </body>

    </html>
    <script>
        window.print();
    </script>