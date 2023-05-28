<br><br><br>
<div class="main-content">
	<div class="section-header mb-4">
		<h2>Tambah Pengguna</h2>
	</div>

	<div class="section-body">

		<div class="row">
			<div class="col-12 col-md-6 col-lg-12">
				<div class="card">
					<form method="post">
						<div class="card-body">
							<div class="form-group">
								<label>Nama </label>
								<input type="text" class="form-control" name="nama" required="">
							</div>
							<div class="form-group">
								<label>Email </label>
								<input type="email" class="form-control" name="email" required="">
							</div>
							<div class="form-group">
								<label>Password </label>
								<input type="password" class="form-control" name="password" required="">
							</div>
						</div>
						<div class="card-footer text-right">
							<button class="btn btn-primary" name="simpan">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	</section>
</div>
<?php
if (isset($_POST['simpan'])) {
	$koneksi->query("INSERT INTO admin
		(nama,email,password)
		VALUES('$_POST[nama]','$_POST[email]','$_POST[password]')") or die(mysqli_error($koneksi));
	echo "<script>alert('Pengguna Berhasil Di Simpan');</script>";
	echo "<script>location='index.php?halaman=pengguna';</script>";
}
?>