<?php
session_start();
include 'koneksi.php';
include 'header.php';
?>
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content d-md-flex justify-content-between align-items-center">
                <div class="mb-3 mb-md-0">
                    <h2 class="text-white">Riwayat</h2>
                </div>
                <div class="page_link">
                    <a class="text-white">Home</a>
                    <a class="text-white">Pesanan Anda</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="cart_area">
    <div class="container">
        <div class="cart_inner">
            <table class="table table-bordered" id="tabelkeranjang">
                <tbody>
                    <?php $nomor = 1; ?>
                    <?php if (!empty($_SESSION["riwayat"])) { ?>
                        <?php foreach ($_SESSION["riwayat"] as $idpembelian) : ?>
                            <?php
                            $ambil = $koneksi->query("SELECT*FROM pembelian WHERE pembelian.idpembelian='$idpembelian'");
                            $detail = $ambil->fetch_assoc();
                            ?>
                            <tr>
                                <td>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-9 col-6 mb-3 my-auto">
                                                    <h4><strong><?= $detail['notransaksi'] ?></strong></h4>
                                                    <div>
                                                        <b class="me-3 text-success"><i class="fa fa-calendar"></i> <?= tanggal(date("Y-m-d", strtotime($detail['waktu']))) . ' ' . date("H:i", strtotime($detail['waktu'])); ?></b>
                                                        <ul>
                                                            <?php $ambilproduk = $koneksi->query("SELECT * FROM pembeliandetail where idpembelian='$detail[idpembelian]'");
                                                            while ($produk = $ambilproduk->fetch_assoc()) { ?>
                                                                <li>
                                                                    <?= $produk['namaproduk'] ?> x <?= $produk['jumlah'] ?>
                                                                </li>
                                                            <?php } ?>
                                                        </ul>
                                                    </div>
                                                    <b class="text-danger">
                                                        <?php
                                                        echo rupiah($detail['grandtotal']);
                                                        ?>
                                                    </b>
                                                    <br>
                                                </div>
                                                <div class="col-md-3 col-6 mb-3 text-center my-auto">
                                                    <a class="btn btn-primary ml-3" href="pembeliandetail.php?id=<?= $idpembelian ?>"><i class="fa fa-eye text-white"></i></a>
                                                    <a class="btn btn-success ml-3" href="downloadbill.php?id=<?= $idpembelian ?>" target="_blank"><i class="fa fa-download text-white"></i></a>
                                                </div>
                                            </div>
                                            <h6 class="mt-2">Status Pesanan : <?= $detail['status'] ?></h6>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php $nomor++; ?>
                    <?php endforeach;
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<?php
include 'footer.php';
?>