<br><br><br>
<div class="main-content">

	<a href="index.php?halaman=penggunatambah" class="btn btn-primary mb-2">Tambah Pengguna</a>
	<div class="section-body">

		<div class="row">

			<div class="col-12 col-md-6 col-lg-12">
				<div class="card">
					<div class="card-header">
						<h4>Data Admin</h4>
					</div>

					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered table-md text-center" id="table">
								<thead class="bg-primary">
									<tr>
										<th class="text-white">No</th>
										<th class="text-white">Nama</th>
										<th class="text-white">Email</th>
										<th class="text-white">Password</th>
										<th class="text-white">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $nomor = 1; ?>
									<?php $ambil = $koneksi->query("SELECT * FROM admin"); ?>
									<?php while ($data = $ambil->fetch_assoc()) { ?>
										<tr>
											<td><?php echo $nomor; ?></td>
											<td><?php echo $data['nama'] ?></td>
											<td><?php echo $data['email'] ?></td>
											<td><?php echo $data['password'] ?></td>
											<td>
												<a href="index.php?halaman=penggunaedit&id=<?php echo $data['idadmin'] ?>" class="btn btn-warning">Edit</a>
												<?php if ($_SESSION['admin']['idadmin'] != $data['idadmin']) { ?>
													<a href="index.php?halaman=penggunahapus&id=<?php echo $data['idadmin'] ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ?')">Hapus</a>
												<?php } ?>
											</td>
										</tr>
										<?php $nomor++; ?>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</section>
</div>
