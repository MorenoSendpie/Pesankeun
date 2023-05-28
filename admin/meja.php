<br><br><br>
<div class="main-content">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<a href="index.php?halaman=ubahmeja" class="btn btn-sm btn-primary shadow-sm float-right pull-right"><i class="fas fa-plus fa-sm text-white-50"></i> Ubah Jumlah Meja </a>
	</div>
	<div class="section-body">
		<div class="row">
			<div class="col-12 col-md-6 col-lg-12">
				<div class="card">
					<div class="card-header">
						<h4>Data Meja</h4>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered table-md text-center" id="table">
								<thead class="bg-primary">
									<tr>
										<th class="text-white">No</th>
										<th class="text-white">Ketersediaan</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$nomor = 1;
									$ambil = $koneksi->query("SELECT m.nomeja, IF(p.status = 'Selesai', 'Tersedia', 'Tidak Tersedia') AS status_meja 
                                    FROM meja m 
                                    LEFT JOIN (
                                        SELECT nomeja, status 
                                        FROM pembelian 
                                        WHERE idpembelian IN (
                                            SELECT MAX(idpembelian) 
                                            FROM pembelian 
                                            GROUP BY nomeja
                                        ) 
                                        ORDER BY idpembelian DESC
                                    ) p ON m.nomeja = p.nomeja
                                    ORDER BY m.nomeja
                                    "); 
									if (!$ambil) {
										die("Query failed: " . $koneksi->error);
									}
                                    $meja_data = array();
									while ($data = $ambil->fetch_assoc()) {
                                        $meja_data[$data['nomeja']] = $data['status_meja'];
									}
                                    $max_nomor = count($meja_data);
									for ($i = 1; $i <= $max_nomor; $i++) { 
									?>
											<tr>
												<td><?php echo $i ?></td>
												<td>
													<?php echo $meja_data[$i]; ?>
												</td>
											</tr>
										<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
