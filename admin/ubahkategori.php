<?php
$ambil = $koneksi->query("SELECT * FROM kategori WHERE idkategori='$_GET[id]'");
$data = $ambil->fetch_assoc();
?>
<br><br><br>
<div class="main-content">
	<div class="section-header mb-4">
		<h2>Ubah Kategori</h2>
	</div>

	<div class="section-body">

		<div class="row">
			<div class="col-12 col-md-6 col-lg-12">
				<div class="card">
					<form method="post">
						<div class="card-body">
							<div class="form-group">
								<label>Nama Kategori</label>
								<input type="text" class="form-control" name="kategori" value=" <?php echo $data['namakategori']; ?>" required="">
							</div>
						</div>
						<div class="card-footer text-right">
							<button class="btn btn-primary" name="ubah">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	</section>
</div>
<?php
if (isset($_POST['ubah'])) {
	$koneksi->query("UPDATE kategori SET namakategori='$_POST[kategori]' WHERE idkategori='$_GET[id]'");
	echo "<script>alert('kKategori Berhasil Di Ubah');</script>";
	echo "<script> location ='index.php?halaman=kategori';</script>";
}
?>