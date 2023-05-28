<br><br><br>
<div class="main-content">
	<div class="section-body">
		<div class="row">
			<div class="col-12 col-md-6 col-lg-12">
				<div class="card">
					<div class="card-header">
						<h4>Data Transaksi</h4>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered table-md text-center" id="table">
								<thead class="bg-primary">
									<tr>
										<th class="text-white">No</th>
										<th class="text-white">Nama</th>
										<th class="text-white">Daftar</th>
										<th class="text-white">Meja</th>
										<th class="text-white">Waktu</th>
										<th class="text-white">Total</th>
										<th class="text-white">Status</th>
										<th class="text-white">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $nomor = 1; ?>
									<?php $ambil = $koneksi->query("SELECT * FROM pembelian order by pembelian.idpembelian desc"); ?>
									<?php while ($data = $ambil->fetch_assoc()) { ?>
										<tr>
											<td><?php echo $nomor; ?></td>
											<td><?php echo $data['nama'] ?></td>
											<td>
												<ul>
													<?php $ambilproduk = $koneksi->query("SELECT * FROM pembeliandetail where idpembelian='$data[idpembelian]'");
													while ($produk = $ambilproduk->fetch_assoc()) { ?>
														<li>
															<?= $produk['namaproduk'] ?> x <?= $produk['jumlah'] ?>
														</li>
													<?php } ?>
												</ul>
											</td>
											<td><?php echo $data['nomeja'] ?></td>
											<td><?= tanggal(date("Y-m-d", strtotime($data['waktu']))) . ' ' . date("H:i", strtotime($data['waktu'])); ?></td>
											<td><?php echo rupiah($data['grandtotal']) ?></td>
											<td><?php echo $data['status'] ?></td>
											<td>
												<a href="index.php?halaman=pembayaran&id=<?php echo $data['idpembelian'] ?>" class="btn btn-info">Detail</a>
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