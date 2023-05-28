<?php
session_start();
include 'koneksi.php';
?>

<?php
include 'header.php';
if (!empty($_POST['keyword'])) {
    $keyword = $_POST['keyword'];
} else {
    $keyword = "";
}
?>
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content d-md-flex justify-content-between align-items-center">
                <div class="mb-3 mb-md-0">
                    <h2 class="text-white">Menu</h2>
                </div>
                <div class="page_link">
                    <a class="text-white">Home</a>
                    <a class="text-white">Menu</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="cat_product_area section_gap">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-12">
                <form method="post">
                    <div class="row">
                        <div class="col-md-9  my-auto">
                            <div class="form-group">
                                <input type="text" name="keyword" value="<?= $keyword ?>" placeholder="Masukkan kata pencarian" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" name="cari" value="cari" class="genric-btn info radius btn-block">Cari</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="container">
            <div class="row flex-row-reverse">
                <div class="col-lg-12">
                    <div class="latest_product_inner">
                        <?php $ambilkategori = $koneksi->query("SELECT * FROM kategori order by namakategori asc");
                        while ($datakategori = $ambilkategori->fetch_assoc()) { ?>
                        <hr>
                            <h2 class="text-center mb-5"><?= $datakategori['namakategori'] ?></h2>
                            <div class="row justify-content-center mb-5" style="padding-bottom:10px">
                                <?php $ambil = $koneksi->query("SELECT *FROM produk WHERE idkategori = $datakategori[idkategori] and (namaproduk LIKE '%$keyword%' OR namaproduk LIKE '%$keyword%' OR hargaproduk LIKE '%$keyword%') order by idproduk desc") or die(mysqli_error($koneksi)); ?>

                                <?php while ($produk = $ambil->fetch_assoc()) { ?>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="single-product">
                                            <div class="product-img">
                                                <img class="card-img" style="height:400px;" src="foto/<?php echo $produk['fotoproduk'] ?>" alt="" />
                                                <div class="p_icon">
                                                    <a href="detail.php?id=<?php echo $produk['idproduk']; ?>">
                                                        <i class="ti-shopping-cart"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-btm">
                                                <a href="detail.php?id=<?php echo $produk['idproduk']; ?>" class="d-block">
                                                    <p class="text-dark text-center"><?= $datakategori['namakategori'] ?></p>
                                                    <h4 class="text-center"><?php echo $produk['namaproduk'] ?></h4>
                                                </a>
                                                <div class="mt-3 text-center">
                                                    <span>Rp <?php echo number_format($produk['hargaproduk']) ?></span>
                                                    <br>
                                                    <div class="mt-2">
                                                        <?php
                                                        if ($produk['kesediaanproduk'] == 'Tersedia') { ?>
                                                            <b class="text-primary"><?= $produk['kesediaanproduk'] ?></b>
                                                        <?php } else { ?>
                                                            <b class="text-danger"><?= $produk['kesediaanproduk'] ?></b>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                    </div>
                <?php } ?>
                </div>
            </div>
        </div>
</section>

<?php
include 'footer.php';
?>