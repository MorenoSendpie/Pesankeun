<br><br><br>
<div class="main-content">
	<div class="section-header mb-4">
		<h2>Tambah Kategori</h2>
	</div>

	<div class="section-body">

		<div class="row">
			<div class="col-12 col-md-6 col-lg-12">
				<div class="card">
					<form method="post">
						<div class="card-body">
							<div class="form-group">
								<label>Nama Kategori</label>
								<input type="text" class="form-control" name="kategori" required="">
							</div>
						</div>
						<div class="card-footer text-right">
							<button class="btn btn-primary" name="tambah">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	</section>
</div>
<?php
if (isset($_POST['tambah'])) {
	$kategori = $_POST["kategori"];

	$koneksi->query("INSERT INTO kategori(namakategori)
		VALUES ('$kategori')");
	echo "<script> alert('Kategori Berhasil Di Tambah');</script>";
	echo "<script> location ='index.php?halaman=kategori';</script>";
}
?>