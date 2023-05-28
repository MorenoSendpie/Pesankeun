<?php
session_start();
include 'koneksi.php';
?>

<?php include 'header.php'; ?>
<section class="banner_area">
	<div class="banner_inner d-flex align-items-center">
		<div class="container">
			<div class="banner_content d-md-flex justify-content-between align-items-center">
				<div class="mb-3 mb-md-0">
					<h2 class="text-white">Checkout</h2>
				</div>
				<div class="page_link">
					<a class="text-white">Home</a>
					<a class="text-white">Checkout</a>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="cart_area">
	<div class="container">
		<div class="cart_inner">
			<div class="table-responsive">
				<table class="table table-bordered">
					<tbody>
						<?php $nomor = 1; ?>
						<?php if (!empty($_SESSION["keranjang"])) { ?>
							<?php
							$grandtotal = 0;
							foreach ($_SESSION["keranjang"] as $idproduk => $jumlah) : ?>
								<?php
								$ambil = $koneksi->query("SELECT * FROM produk 
								WHERE idproduk='$idproduk'");
								$data = $ambil->fetch_assoc();
								$totalharga = $data["hargaproduk"] * $jumlah;
								?>
								<tr>
									<td>
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col-md-9 col-6 my-auto">
														<h4><strong><?= $data['namaproduk'] ?></strong></h4>
														<div class="d-flex">
															<small class="me-3 text-danger" id="tulisan-<?= $idproduk ?>">Jumlah Pesanan : <?= $jumlah . ' x ' . rupiah($data['hargaproduk']) ?></small>
														</div>
													</div>
													<div class="col-md-3 col-6 text-center my-auto">
														<b class="text-danger" id="totalharga-<?= $idproduk ?>">
															<?php
															echo rupiah($totalharga);
															?>
														</b>
													</div>
												</div>
											</div>
										</div>
									</td>
								</tr>
								<?php $nomor++; ?>
						<?php
								$grandtotal += $totalharga;
							endforeach;
						} ?>
					</tbody>
				</table>
			</div>
			<div class="row justify-content-center mt-5">
				<div class="col-xl-12 ftco-animate">
					<form method="post">
						<?php
						if (!empty($_SESSION["nama"])) {
							$namapelanggan = $_SESSION["nama"];
						} else {
							$namapelanggan = "";
						}
						if (!empty($_SESSION["nohp"])) {
							$nohppelanggan = $_SESSION["nohp"];
						} else {
							$nohppelanggan = "";
						}
						?>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Nama Pelanggan</label>
									<input type="text" required value="<?= $namapelanggan ?>" class="form-control" placeholder="Tuliskan Nama Anda" name="nama">
								</div>
								<div class="form-group">
									<label>No. Handphone Pelanggan<span class="text-danger"> *Optional</span></label>
									<input type="text" name="nohp" value="<?= $nohppelanggan ?>" class="form-control">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>No Meja</label>
									<select name="nomeja" class="form-select" required>
										<?php $ambilmeja = $koneksi->query("SELECT * FROM meja");
										while ($datameja = $ambilmeja->fetch_assoc()) { ?>
											<option value="<?= $datameja['nomeja'] ?>"><?= $datameja['nomeja'] ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="form-group" style="padding-top:35px">
									<label>Grandtotal</label>
									<input class="form-control" value="<?= rupiah($grandtotal) ?>" readonly type="text">
									<input class="form-control" name="grandtotal" value="<?= $grandtotal ?>" required readonly type="hidden">
								</div>
								<button class="genric-btn info circle pull-right btn-lg" name="checkout">Selesaikan Pesanan</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
</section>
<br><br>
<?php
if (isset($_POST["checkout"])) {
	$notransaksi = '#INV-' . date("Ymdhis");
	$grandtotal = $_POST["grandtotal"];
	$nomeja = $_POST["nomeja"];
	$nohp = $_POST["nohp"];
	$nama = $_POST["nama"];
	$koneksi->query(
		"INSERT INTO pembelian(notransaksi, nama, nohp, nomeja, grandtotal, status)
				VALUES('$notransaksi','$nama','$nohp', '$nomeja', '$grandtotal', 'Sedang di proses, mohon ditunggu ya')"
	) or die(mysqli_error($koneksi));
	$idpembelian = $koneksi->insert_id;
	foreach ($_SESSION['keranjang'] as $idproduk => $jumlah) {
		$ambil = $koneksi->query("SELECT*FROM produk WHERE idproduk='$idproduk'");
		$perproduk = $ambil->fetch_assoc();
		$namaproduk = $perproduk['namaproduk'];
		$hargaproduk = $perproduk['hargaproduk'];
		$subharga = $perproduk['hargaproduk'] * $jumlah;
		$koneksi->query("INSERT INTO pembeliandetail (idpembelian, idproduk, namaproduk, hargaproduk, subharga, jumlah)
					VALUES ('$idpembelian','$idproduk', '$namaproduk','$hargaproduk','$subharga','$jumlah')") or die(mysqli_error($koneksi));
	}
	unset($_SESSION["keranjang"]);
	$_SESSION["riwayat"][] = $idpembelian;
	$_SESSION["nama"] = $nama;
	$_SESSION["nohp"] = $nohp;
	echo "<script> alert('Pembelian Sukses, Pesanan anda akan segera kami proses dan diantarkan ke meja anda');</script>";
	echo "<script> location ='riwayat.php';</script>";
}
?>
<?php
include 'footer.php';
?>