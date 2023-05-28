<?php
$ambil = $koneksi->query("SELECT * FROM produk WHERE idproduk='$_GET[id]'");
$data = $ambil->fetch_assoc();
?>
<?php
$datakategori = array();
$ambil = $koneksi->query("SELECT * FROM kategori");
while ($tiap = $ambil->fetch_assoc()) {
	$datakategori[] = $tiap;
}
?>
<br><br><br>
<div class="main-content">
	<div class="section-header mb-4">
		<h2>Ubah Produk</h2>
	</div>
	<div class="section-body">
		<div class="row">
			<div class="col-12 col-md-6 col-lg-12">
				<div class="card">
					<div class="card-body">
						<form method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label>Nama Produk</label>
								<input type="text" name="nama" class="form-control" value="<?php echo $data['namaproduk']; ?>">
							</div>
							<div class="form-group">
								<label>Nama Kategori</label>
								<select class="form-control" name="idkategori">
									<option value="">Pilih Kategori</option>
									<?php foreach ($datakategori as $key => $value) : ?>
										<option value="<?php echo $value["idkategori"] ?>" <?php if ($data["idkategori"] == $value["idkategori"]) {
																								echo "selected";
																							} ?>><?php echo $value["namakategori"] ?></option>
									<?php endforeach ?>
								</select>
							</div>
							<div class="form-group">
								<label>Harga Rp</label>
								<input type="number" name="harga" class="form-control" value="<?php echo $data['hargaproduk']; ?>">
							</div>
							<div class="form-group">
								<img src="../foto/<?php echo $data['fotoproduk']; ?>" width="200">
							</div>
							<div class="form-group">
								<label> Ganti Foto</label>
								<input type="file" class="form-control" name="foto">
							</div>
							<div class="form-group">
								<label>Deskripsi</label>
								<textarea name="deskripsi" class="form-control" id="deskripsi" rows="10"><?php echo $data['deskripsiproduk']; ?></textarea>
							</div>
							<div class="form-group">
								<label>Kesediaan Produk</label>
								<select name="kesediaanproduk" class="form-control">
									<option <?php if ($data['kesediaanproduk'] == 'Tersedia') echo 'selected'; ?> value="Tersedia">Tersedia</option>
									<option <?php if ($data['kesediaanproduk'] == 'Tidak Tersedia') echo 'selected'; ?> value="Tidak Tersedia">Tidak Tersedia</option>
								</select>
							</div>
							<div class="card-footer text-right">
								<button class="btn btn-primary" name="ubah">Submit</button>
							</div>
							<script>
								CKEDITOR.replace('deskripsi');
							</script>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	</section>
</div>


<?php
if (isset($_POST['ubah'])) {

	$namafoto = $_FILES['foto']['name'];
	$lokasifoto = $_FILES['foto']['tmp_name'];

	if (!empty($lokasifoto)) {
		move_uploaded_file($lokasifoto, "../foto/$namafoto");

		$koneksi->query("UPDATE produk SET namaproduk='$_POST[nama]',idkategori='$_POST[idkategori]',hargaproduk='$_POST[harga]',fotoproduk='$namafoto', deskripsiproduk='$_POST[deskripsi]', kesediaanproduk='$_POST[kesediaanproduk]' WHERE idproduk='$_GET[id]'");
	} else {
		$koneksi->query("UPDATE produk SET namaproduk='$_POST[nama]', idkategori='$_POST[idkategori]',hargaproduk='$_POST[harga]',deskripsiproduk='$_POST[deskripsi]', kesediaanproduk='$_POST[kesediaanproduk]' WHERE idproduk='$_GET[id]'");
	}
	echo "<script>alert('Data Produk Berhasil Diubah');</script>";
	echo "<script>location='index.php?halaman=produk';</script>";
}
?>