<?php
session_start();
include 'koneksi.php';
include 'header.php';
$ambil = $koneksi->query("SELECT*FROM pembelian
	WHERE pembelian.idpembelian='$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content d-md-flex justify-content-between align-items-center">
                <div class="mb-3 mb-md-0">
                    <h2 class="text-white">Detail Pesanan</h2>
                </div>
                <div class="page_link">
                    <a class="text-white">Home</a>
                    <a class="text-white">Detail Pesanan Anda</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="cart_area">
    <div class="container">
        <div class="cart_inner">
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>No.</td>
                                <td>: <?php echo $detail['notransaksi']; ?></td>
                            </tr>
                            <tr>
                                <td>Nama.</td>
                                <td>: <?php echo $detail['nama']; ?></td>
                            </tr>
                            <tr>
                                <td>No. HP</td>
                                <td>: <?php echo $detail['nohp']; ?></td>
                            </tr>
                            <tr>
                                <td>No. Meja</td>
                                <td>: <?php echo $detail['nomeja']; ?></td>
                            </tr>
                            <tr>
                                <td>Waktu</td>
                                <td>: <?= tanggal(date("Y-m-d", strtotime($detail['waktu']))) . ' ' . date("H:i", strtotime($detail['waktu'])); ?></td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>: <?php echo $detail['status']; ?></td>
                            </tr>
                            <tr>
                                <td>Grandtotal</td>
                                <td>: <?php echo rupiah($detail['grandtotal']); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <br>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1; ?>
                    <?php $ambil = $koneksi->query("SELECT * FROM pembeliandetail WHERE idpembelian='$_GET[id]'"); ?>
                    <?php while ($data = $ambil->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $nomor; ?></td>
                            <td><?php echo $data['namaproduk']; ?></td>
                            <td><?php echo rupiah($data['hargaproduk']); ?></td>
                            <td><?php echo $data['jumlah']; ?></td>
                            <td><?php echo rupiah($data['subharga']); ?></td>
                        </tr>
                        <?php $nomor++; ?>
                    <?php } ?>
                </tbody>
            </table>
            <a class="btn btn-success float-right" href="downloadbill.php?id=<?= $detail['idpembelian'] ?>" target="_blank"><i class="fa fa-download"> Download Bill</i></a>
        </div>
</section>
<?php
include 'footer.php';
?>