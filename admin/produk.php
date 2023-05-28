<br><br><br>
<div class="main-content">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<a href="index.php?halaman=tambahproduk" class="btn btn-sm btn-primary shadow-sm float-right pull-right"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Produk</a>
	</div>
	<div class="section-body">
		<div class="row">
			<div class="col-12 col-md-6 col-lg-12">
				<div class="card">
					<div class="card-header">
						<h4>Data Produk</h4>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered table-md text-center" id="table">
								<thead class="bg-primary">
									<tr>
										<th class="text-white">No</th>
										<th class="text-white">Nama</th>
										<th class="text-white">Kategori</th>
										<th class="text-white">Harga</th>
										<th class="text-white">Foto</th>
										<th class="text-white">Kesediaan</th>
										<th class="text-white">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $nomor = 1; ?>
									<?php $ambil = $koneksi->query("SELECT*FROM produk LEFT JOIN kategori ON produk.idkategori=kategori.idkategori"); ?>
									<?php while ($data = $ambil->fetch_assoc()) { ?>
										<tr>
											<td><?php echo $nomor; ?></td>
											<td><?php echo $data['namaproduk'] ?></td>
											<td><?php echo $data['namakategori'] ?></td>
											<td><?php echo $data['hargaproduk'] ?></td>
											<td>
												<img src="../foto/<?php echo $data['fotoproduk'] ?>" width="100px">
											</td>
											<td><?php echo $data['kesediaanproduk'] ?></td>
											<td>
												<a href="index.php?halaman=ubahproduk&id=<?php echo $data['idproduk']; ?>" class="btn btn-warning m-1">Ubah</a>
												<a href="index.php?halaman=hapusproduk&id=<?php echo $data['idproduk']; ?>" class="btn btn-danger m-1" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ?')">Hapus</a>
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