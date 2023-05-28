<?php
$idpembelian = $_GET['id'];
$ambil = $koneksi->query("SELECT*FROM pembelian
	WHERE pembelian.idpembelian='$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>
<br><br><br>
<div class="main-content">
	<div class="section-body">
		<div class="row">
			<div class="col-12 col-md-6 col-lg-12">
				<div class="card">
					<div class="card-header">
						<h4>Data Pembelian</h4>
					</div>
					<div class="card-body">
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
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 mb-4">
				<div class="card shadow mb-4">
					<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
						<h6 class="m-0 font-weight-bold text-primary">Status Transaksi</h6>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-12">
								<form method="post">
									<div class="form-group">
										<label>Status</label>
										<select class="form-control" name="status">
											<option <?php if ($detail['status'] == 'Sedang di proses, mohon ditunggu ya') echo 'selected'; ?> value="Sedang di proses, mohon ditunggu ya">Sedang di proses, mohon ditunggu ya</option>
											<option <?php if ($detail['status'] == 'Makanan sudah siap dan diantarkan') echo 'selected'; ?> value="Makanan sudah siap dan diantarkan">Makanan sudah siap dan diantarkan</option>
											<option <?php if ($detail['status'] == 'Selesai') echo 'selected'; ?> value="Selesai">Selesai</option>
										</select>
									</div>
									<button class=" btn btn-primary float-right pull-right" name="proses">Simpan</button>
									<br>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
if (isset($_POST["proses"])) {
	$status = $_POST["status"];
	$koneksi->query("UPDATE pembelian SET status='$status'
		WHERE idpembelian='$idpembelian'");
	echo "<script>alert('Status Transaksi Berhasil Diupdate')</script>";
	echo "<script>location='index.php?halaman=pembelian';</script>";
} ?>