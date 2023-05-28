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
					<h2 class="text-white">Keranjang</h2>
				</div>
				<div class="page_link">
					<a class="text-white">Home</a>
					<a class="text-white">Keranjang</a>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="cat_product_area section_gap">
	<div class="container">
		<div class="table-">
			<style>
				.dataTables_filter {
					display: none;
				}
			</style>
			<div class="row justify-content-end">
				<div class="col-md-12">
					<div class="form-group">
						<input type="text" class="form-control input-lg" id="pencariantabelkeranjang" placeholder="Cari disini">
					</div>
				</div>
			</div>
			<table class="table table-bordered" id="tabelkeranjang">
				<thead>
					<tr>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php $nomor = 1; ?>
					<?php if (!empty($_SESSION["keranjang"])) { ?>
						<?php foreach ($_SESSION["keranjang"] as $idproduk => $jumlah) : ?>
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
												<div class="col-md-9 col-6 mb-3 my-auto">
													<h4><strong><?= $data['namaproduk'] ?></strong></h4>
													<div class="d-flex mb-3">
														<small class="me-3 text-danger" id="tulisan-<?= $idproduk ?>">Jumlah Pesanan : <?= $jumlah . ' x ' . rupiah($data['hargaproduk']) ?></small>
													</div>
													<b class="text-danger" id="totalharga-<?= $idproduk ?>">
														<?php
														echo rupiah($totalharga);
														?>
													</b>
													<br>
													<div class="d-flex mt-3">
														<input type="number" name="jumlah" value="<?= $jumlah ?>" class="form-control mr-3 jumlah-produk" id="jumlah-<?= $idproduk ?>">
														<a class="btn btn-danger ml-3 hapus" data-idproduk="<?= $idproduk ?>" id="hapus"><i class="fa fa-trash text-white"></i></a>
													</div>
												</div>
												<div class="col-md-3 col-6 mb-3 text-center my-auto">
													<img src="foto/<?= $data['fotoproduk'] ?>" width="100%" style="border-radius: 10px;">
												</div>
											</div>
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
	</div>
	<br><br>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="float-right">
					<a href="produk.php" class="gray_btn m-1">Lanjutkan Belanja</a>
					<?php if (!empty($_SESSION["keranjang"])) { ?>
						<a href="checkout.php" class="main_btn m-1">Checkout</a>
					<?php } else { ?>
						<a class="btn btn-secondary m-1 text-white">Checkout</a>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
include 'footer.php';
?>
<script>
	$(document).ready(function() {
		$('.jumlah-produk').change(function() {
			var jumlah = $(this).val();
			var idproduk = $(this).attr('id').split('-')[1];
			$.ajax({
				url: 'updatekeranjang.php',
				method: 'POST',
				dataType: 'json',
				data: {
					jumlah: jumlah,
					idproduk: idproduk
				},
				success: function(response) {
					var tulisan = response.tulisan;
					var totalharga = response.totalharga;
					$('#totalharga-' + idproduk).text(totalharga);
					$('#tulisan-' + idproduk).text(tulisan);
				}
			});
		});
	});
	$(".hapus").click(function(e) {
		var obj = $(this);
		var idproduk = $(this).data('idproduk');
		$.ajax({
			url: 'hapuskeranjang.php',
			type: 'POST',
			dataType: 'json',
			data: {
				idproduk: idproduk
			},
			success: function(response) {
				if (response) {
					$(obj).closest("tr").remove();
				}
			}
		});
	});
</script>