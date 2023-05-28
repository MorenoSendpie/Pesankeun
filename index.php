<?php
session_start();
include 'koneksi.php';
?>

<?php include 'header.php'; ?>
<section class="home_banner_area mb-40">
	<div class="banner_inner d-flex align-items-center">
		<div class="container">
			<div class="banner_content row">
				<div class="col-lg-12">
					<p class="sub text-uppercase">SELAMAT DATANG DI WEBSITE</p>
					<h3><span></span> Pesankeun</h3>
					<a class="main_btn mt-40" href="produk.php">Beli</a>
				</div>
			</div>
		</div>
	</div>
</section>
<br><br><br>
<section class="feature_product_area section_gap_bottom_custom">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-12">
				<div class="main_title">
					<h2><span>Menu Terbaru</span></h2>
				</div>
			</div>
		</div>

		<div class="row">
			<?php $ambil = $koneksi->query("SELECT *FROM produk LEFT JOIN kategori ON produk.idkategori=kategori.idkategori order by idproduk desc limit 3"); ?>
			<?php while ($perproduk = $ambil->fetch_assoc()) { ?>
				<div class="col-lg-4 col-md-6">
					<div class="single-product">
						<div class="product-img">
							<img class="img-fluid w-100" style="height:400px;" src="foto/<?php echo $perproduk['fotoproduk'] ?>" alt="" />
							<div class="p_icon">
								<a href="detail.php?id=<?php echo $perproduk['idproduk']; ?>">
									<i class="ti-shopping-cart"></i>
								</a>
							</div>
						</div>
						<div class="product-btm">
							<a href="detail.php?id=<?php echo $perproduk['idproduk']; ?>" class="d-block">
								<h4 class="text-center"><?php echo $perproduk["namaproduk"] ?></h4>
							</a>
							<div class="mt-3 text-center">
								<span class="mr-4">Rp <?php echo number_format($perproduk['hargaproduk']) ?></span>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</section>
<section class="new_product_area section_gap_top section_gap_bottom_custom">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-12">
				<div class="main_title">
					<h2><span>Galeri</span></h2>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-6">
				<div class="product-img">
					<img class="img-fluid" src="foto/leblanc_1.png" alt="" />
				</div>
			</div>
			<div class="col-lg-6">
				<div class="product-img">
					<img class="img-fluid" src="foto/leblanc_2.png" alt="" />
				</div>
			</div>
		</div>
	</div>
</section>


<?php
include 'footer.php';
?>