<?php
$kategori = $koneksi->query("SELECT * FROM kategori");
$jumlahkategori = $kategori->num_rows;

$produk = $koneksi->query("SELECT * FROM produk");
$jumlahproduk = $produk->num_rows;

$pembelian = $koneksi->query("SELECT * FROM pembelian");
$jumlahpembelian = $pembelian->num_rows;
?>

<div class="main-content">
    <br><br>
    <div class="row mb-3">
        <div class="col-md-12">
            <center>
                <img src="../foto/bgdepan.png" width="400px" style="border-radius: 10px">
            </center>
        </div>
    </div>
    <br>
    <section class="section">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-statistic-2">
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-archive"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Jumlah Kategori</h4>
                        </div>
                        <div class="card-body">
                            <?php echo $jumlahkategori ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-statistic-2">
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fa fa-list text-white"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Jumlah Produk</h4>
                        </div>
                        <div class="card-body">
                            <?= $jumlahproduk ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-statistic-2">
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-shopping-bag"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Jumlah Pembelian</h4>
                        </div>
                        <div class="card-body">
                            <?= $jumlahpembelian ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>