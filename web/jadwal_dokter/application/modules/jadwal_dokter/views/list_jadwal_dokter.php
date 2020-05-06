			<!-- <div class="col-md-12 col-sm-12 col-xs-12"> -->
			<div class="x_panel">
				<div class="x_title">
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
						</li>

						<li><a class="close-link"><i class="fa fa-close"></i></a>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<p class="text-muted m-b-30" style="font-size: 14px; font-weight: bold; color: red; align: center; text-align: center;">
						<marquee><i style="font-size: 11px;"><?php echo date("d-M-Y"); ?> &nbsp; || &nbsp; * Jadwal Dokter Selama Wabah Covid-19 *</i></marquee>
					</p>
					<table id="dataTable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>NO</th>
								<th>POLIKLINIK</th>
								<th>NAMA DOKTER</th>
								<th>SENIN</th>
								<th>SELASA</th>
								<th>RABU</th>
								<th>KAMIS</th>
								<th>JUMAT</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody id="body-new">
							<?php
							if (!empty($jadwal)) {
								$no = 1;
								foreach ($jadwal as $i) {
							?>
									<tr>
										<td><?php echo $no++ ?></td>
										<td><?php echo $i->poliklinik ?></td>
										<td><?php echo $i->dokter ?></td>
										<td><?php echo $i->senin ?></td>
										<td><?php echo $i->selasa ?></td>
										<td><?php echo $i->rabu ?></td>
										<td><?php echo $i->kamis ?></td>
										<td><?php echo $i->jumat ?></td>
										<td style="text-align: center;">
											<!-- <a href="https://daftaronlinersud.tangerangselatankota.go.id/home/daftar" title="Daftar Online" target="_blank"><button class="btn btn-primary btn-sm">Daftar &nbsp;<span class="glyphicon glyphicon-print" aria-hidden="true"></span></button></a> -->
											<!-- <button class="btn btn-primary btn-xs view_data" id="<?php //echo $i->id 
																										?>"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></button> -->
											<button class="btn btn-xs" style="background-color: #02C2C1; color: #fff" data-toggle="modal" data-target="#exampleModal" id="<?php echo $i->id ?>">Daftar</button>
											<!-- <a href="https://daftaronlinersud.tangerangselatankota.go.id/home/daftar"><span class="badge" style="background-color: #02C2C9;">Daftar</span></a> -->
											<!-- <a href="#"><span class="badge" style="background-color: #02C2C9;" data-toggle="modal" data-target="#exampleModal">Daftar</span></a> -->
										</td>
									</tr>
							<?php
								}
							}
							?>
						</tbody>
					</table>


				</div>
			</div>
			<!-- </div> -->

			<!-- Modal Jadwal Covid-19 -->
			<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<!-- <h5 class="modal-title" id="exampleModalLabel"></h5> -->
							<button type="button" class="close btn-sm" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<p style="font-size: 16px; color: red; font-weight: bold; text-align: center;">*Mohon Maaf, Selama Wabah Covid-19 Pendaftaran Rawat Jalan Tidak Bisa Melalui Online dan Sms*</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>

			<!--Modal-->
			<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="dokterModal">
				<div class="modal-dialog modal-md">
					<div class="modal-content">

						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
							</button>
							<h4 class="modal-title" id="myModalLabel2">Profil Dokter</h4>
						</div>
						<div class="modal-body">

							<div id="dokter_result">

							</div>

						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>

					</div>
				</div>
			</div>
			<!-- /modals -->


			<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

			<script type="text/javascript">
				$(document).ready(function() {
					$('#dataTable').DataTable();
					$('#dataTable').on('click', '.view_data', function() {
						var dokterData = $(this).attr('id');
						$.ajax({
							url: "<?php echo base_url() ?>jadwal_dokter/get_dokter_result",
							method: "POST",
							data: {
								dokterData: dokterData
							},
							success: function(data) {
								$('#dokter_result').html(data);
								$('#dokterModal').modal('show');
							}
						});
					});
				});
			</script>

			<script type="text/javascript">
				const tr = document.getElementById('body-new');
				tr.style.backgroundColor = 'lightblue';
			</script>