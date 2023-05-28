<?php
session_start();
include 'koneksi.php';
if (!empty($_POST['keyword'])) {
	$keyword = $_POST['keyword'];
} else {
	$keyword = "";
}
include 'header.php';
$kategori = $_GET["id"];
$semuadata = array();
$ambil = $koneksi->query("SELECT*FROM produk WHERE (namaproduk LIKE '%$keyword%' OR namaproduk LIKE '%$keyword%' OR hargaproduk LIKE '%$keyword%') and idkategori = $kategori");
while ($data = $ambil->fetch_assoc()) {
	$semuadata[] = $data;
}

$datakategori = array();
$ambil = $koneksi->query("SELECT * FROM kategori");
while ($tiap = $ambil->fetch_assoc()) {
	$datakategori[] = $tiap;
}
$am = $koneksi->query("SELECT * FROM kategori where idkategori='$kategori'");
$pe = $am->fetch_assoc()
?>
<section class="banner_area">
	<div class="banner_inner d-flex align-items-center">
		<div class="container">
			<div class="banner_content d-md-flex justify-content-between align-items-center">
				<div class="mb-3 mb-md-0">
					<h2 class="text-white">Kategori</h2>
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
			<div class="row mb-3 pb-3">
				<div class="col-md-12 heading-section ftco-animate">
					<h3 class="mb-4">Kategori : <?php echo $pe["namakategori"] ?></h3>
					<?php if (empty($semuadata)) : ?>
						<div class="alert alert-danger">Produk <strong><?php echo  $pe["namakategori"] ?></strong> Kosong</div>
					<?php endif ?>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row flex-row-reverse">
				<div class="col-lg-12">

					<div class="latest_product_inner">
						<div class="row">
							<?php foreach ($semuadata as $key => $produk) : ?>
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
												<p class="text-dark"><?= $pe["namakategori"] ?></p>
												<h4><?php echo $produk['namaproduk'] ?></h4>
											</a>
											<div class="mt-3">
												<span class="mr-4">Rp <?php echo number_format($produk['hargaproduk']) ?></span>
											</div>
										</div>
									</div>
								</div>
							<?php endforeach ?>
						</div>
					</div>
				</div>
			</div>
		</div>
</section>

<?php
include 'footer.php';
?>