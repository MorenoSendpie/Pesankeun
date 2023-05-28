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
		<h2>Tambah Produk</h2>
	</div>

	<div class="section-body">

		<div class="row">
			<div class="col-12 col-md-6 col-lg-12">
				<div class="card">
					<div class="card-body">
						<form method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label>Nama</label>
								<input type="text" class="form-control" name="nama">
							</div>
							<div class="form-group">
								<label>Nama Kategori</label>
								<select class="form-control" name="idkategori">
									<option value="">Pilih Kategori</option>
									<?php foreach ($datakategori as $key => $value) : ?>

										<option value="<?php echo $value["idkategori"] ?>"><?php echo $value["namakategori"] ?></option>

									<?php endforeach ?>
								</select>
							</div>
							<div class="form-group">
								<label>Harga (Rp)</label>
								<input type="number" class="form-control" name="harga">
							</div>
							<div class="form-group">
								<label>Deskripsi</label>
								<textarea class="form-control" name="deskripsi" id="deskripsi" rows="10"></textarea>
								<script>
									CKEDITOR.replace('deskripsi');
								</script>
							</div>
							<div class="form-group">
								<label>Foto</label>
								<div class="letak-input" style="margin-bottom: 10px;">
									<input type="file" class="form-control" name="foto">
								</div>
							</div>
							<div class="form-group">
								<label>Kesediaan Produk</label>
								<select class="form-control" name="kesediaanproduk">
									<option value="Tersedia">Tersedia</option>
									<option value="Tidak Tersedia">Tidak Tersedia</option>
								</select>
							</div>
							<div class="card-footer text-right">
								<button class="btn btn-primary" name="save">Submit</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	</section>
</div>
<?php
if (isset($_POST['save'])) {
	$namafoto = $_FILES['foto']['name'];
	$lokasifoto = $_FILES['foto']['tmp_name'];
	move_uploaded_file($lokasifoto, "../foto/" . $namafoto);
	$koneksi->query("INSERT INTO produk
		(namaproduk,idkategori,hargaproduk,fotoproduk,deskripsiproduk, kesediaanproduk)
		VALUES('$_POST[nama]','$_POST[idkategori]','$_POST[harga]','$namafoto','$_POST[deskripsi]','$_POST[kesediaanproduk]')");
	$idproduk_barusan = $koneksi->insert_id;
	echo "<script>alert('Produk Berhasil Di Simpan');</script>";
	echo "<script> location ='index.php?halaman=produk';</script>";
}
?>