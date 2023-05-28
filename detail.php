<?php
session_start();
include 'koneksi.php';
?>
<?php
$idproduk = $_GET["id"];
$ambil = $koneksi->query("SELECT*FROM produk WHERE idproduk='$idproduk'");
$detail = $ambil->fetch_assoc();
$kategori = $detail["idkategori"];
?>
<?php include 'header.php'; ?>
<section class="banner_area">
	<div class="banner_inner d-flex align-items-center">
		<div class="container">
			<div class="banner_content d-md-flex justify-content-between align-items-center">
				<div class="mb-3 mb-md-0">
					<h2 class="text-white">Detail Menu </h2>
				</div>
			</div>
		</div>
	</div>
</section>

<div class="product_image_area">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<img src="foto/<?php echo $detail["fotoproduk"]; ?>" alt="First slide" style="border-radius:10px;width:100%">
			</div>
			<div class="col-md-6 my-auto">
				<div class="s_product_text2 mt-5">
					<h3><?php echo $detail["namaproduk"] ?></h3>
					<h2 class="text-success"><?php echo rupiah($detail["hargaproduk"]); ?></h2>
					<p class="text-bold"><?= $detail['kesediaanproduk'] ?></p>
					<?php echo $detail["deskripsiproduk"]; ?>
					<form method="post">
						<div class="form-group">
							<?php
							if ($detail['kesediaanproduk'] == 'Tersedia') { ?>
								<div class="mb-3">
									<label for="qty">Masukkan Jumlah Produk :</label>
									<input type="number" min="1" name="jumlah" value="1" required class="form-control">
								</div>
								<div class="card_area">
									<button class="main_btn float-end float-right" name="beli"><i class="fa fa-shopping-cart"></i> Beli</button>
								</div>
							<?php } else { ?>
								<div class="mb-3">
									<label for="qty">Masukkan Jumlah Produk :</label>
									<input type="number" min="1" name="jumlah" value="1" readonly class="form-control">
								</div>
								<button class="main_btn float-end float-right" disabled style="background-color: #454545!important;border-color:#454545!important;"><i class="fa fa-shopping-cart"></i> Tidak Tersedia</button>
							<?php } ?>
						</div>
					</form>
					<?php
					if (isset($_POST["beli"])) {
						$jumlah = $_POST["jumlah"];
						$_SESSION["keranjang"][$idproduk] = $jumlah;
						echo "<script> alert('Produk Masuk Ke Keranjang');</script>";
						echo "<script> location ='keranjang.php';</script>";
					}
					?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
include 'footer.php';
?>