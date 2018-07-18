<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Analis</title>

	<link href=<?php echo base_url("assets/vendor/bootstrap/css/bootstrap.min.css")?> rel="stylesheet">
	<link href=<?php echo base_url("assets/vendor/metisMenu/metisMenu.min.css")?>  rel="stylesheet">
	<link href=<?php echo base_url("assets/vendor/datatables-plugins/dataTables.bootstrap.css")?>  rel="stylesheet">
	<link href=<?php echo base_url("assets/vendor/datatables-responsive/dataTables.responsive.css")?>  rel="stylesheet">
	<link href=<?php echo base_url("assets/dist/css/sb-admin-2.css")?> rel="stylesheet">
	<link href=<?php echo base_url("assets/select2/dist/css/select2.min.css")?> rel="stylesheet">
	<link href=<?php echo base_url("assets/vendor/font-awesome/css/font-awesome.min.css")?>  rel="stylesheet" type="text/css">

</head>

<body>

	<div id="wrapper">

		<!-- Navigation -->
		<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0; background-color: #204060">
			<div class="navbar-header">

				<a class="navbar-brand" style="color: #ffffff" >SI PENGADUAN</a>
			</div>
			<!-- /.navbar-header -->

			<ul class="nav navbar-top-links navbar-right">

				<!-- /.dropdown -->
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: #ffffff">
						<i class="fa fa-user fa-fw"></i> <?php echo $this->session->userdata('nama_pengguna'); ?></i>
					</a>
					<ul class="dropdown-menu dropdown-user">
						<li><a href="<?php echo base_url('logout_karyawan')?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
						</li>
					</ul>
					<!-- /.dropdown-user -->
				</li>
			</ul>
			<!-- /.navbar-top-links -->
			
			<!--- user panel -->
			<section class="sidebar">
			</section>

			<div class="navbar-default sidebar" role="navigation"> <!--style="margin-top: 15%;"-->
				<div class="sidebar-nav navbar-collapse">
					<ul class="nav" id="side-menu">

						<li class="sidebar-search" >
							<div class="input-group custom-search-form" >
								<b>Menu Sistem</b>
							</div>
							<!--  input-group -->
						</li>
						
						<li class="active">
							<a href=<?php echo base_url('analis')?> style="color: #000000"><i class="fa fa-envelope"></i><b>&nbsp; Pengaduan Masuk</b></a>
						</li>
						<li>
							<a href=<?php echo base_url('analis/riwayat_pengaduan')?> ><i class="fa fa-table"></i>&nbsp; Riwayat Pengaduan</a>
						</li>
						<li>
							<a href=<?php echo base_url('analis/kelola')?>><i class="fa fa-gears"></i>&nbsp; Kategori dan Jenis</a>
						</li>
						<li>
							<a href=<?php echo base_url('analis/laporan')?>><i class="fa fa-dashboard"></i>&nbsp; Laporan Pengaduan</a>
						</li>
						
					</ul>
				</div>
				<!-- /.sidebar-collapse -->
			</div>
			<!-- /.navbar-static-side -->
		</nav>
		

		<!-- Page Content -->
		<div id="page-wrapper">
			<div class="row">

				<center>
					<?php if($this->session->flashdata('message')): ?>
						<div style="margin-top: 10px; width: 50%" id="hilang" class="alert alert-<?php echo $this->session->flashdata('style') ?> alert-dismissable fade-in">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<strong><?php echo $this->session->flashdata('alert') ?></strong>&nbsp;<br>
							<?php echo $this->session->flashdata('message') ?>
						</div>
					<?php endif; ?>
				</center>

				<div class="col-lg-12">
					<h1 class="page-header">Detail Pengaduan</h1>
				</div>
				<!-- /.col-lg-12 -->
			</div>
			<!-- /.row -->
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<div>
								<a href="#" class="btn btn-success" data-toggle="modal" data-target="#modalKonfirmasi"><span class="fa fa-check"></span> Konfirmasi </a>

								<a style="margin-left: 20px" href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalKategori"><span class="fa fa-plus"></span> Buat Kategori </a>

							</div>
							
						</div>
						<div class="panel-body">
							<table class="table no border" cellpadding="0" cellspacing="0"" >
								<tr>
									<div class="alert alert-warning" style="background-color: #ffe0b3">
										<label>Laporan Koordinator :</label><br>
										<?php
										foreach ($detail_pengaduan as $data) 
										{
											echo $data->keterangan . "";
										}
										?>
									</div>
								</tr>
								<tr>
									<td><b>Gambar Pendukung:</b></td>
									<td>:</td>
									<td style="width: 80%"><img src="<?php echo base_url('assets/gambar/'.$detail_pengaduan[0]->gambar) ?>" style="width: 200px; height: auto"></td>
								</tr>
								<tr>
									<td><b>Tanggal Kejadian</b></td>
									<td>:</td>
									<td><?php echo $detail_pengaduan[0]->tgl_kejadian ?></td>
								</tr>
								<tr>
									<td><b>Nama Pengadu</b></td>
									<td>:</td>
									<td>
									<?php 
										if($detail_pengaduan[0]->hidden){
											echo "anonim";
										}else{
											echo $detail_pengaduan[0]->nama_pengguna; 
										}
										
									?>	
									</td>
								</tr>
								<tr>
									<td><b>Ruang</b></td>
									<td>:</td>
									<td><?php echo $detail_pengaduan[0]->nama_ruang ?></td>
								</tr>
								<tr>
									<td><b>Jumlah kejadian</b></td>
									<td>:</td>
									<td><?php echo $detail_pengaduan[0]->kejadian ?></td>
								</tr>
								<tr>
									<td><b>Penyebab</b></td>
									<td>:</td>
									<td><?php echo $detail_pengaduan[0]->penyebab ?>
									</td>
								</tr>
								<tr>
									<td><b>Efek kejadian</b></td>
									<td>:</td>
									<td><?php echo $detail_pengaduan[0]->efek ?></td>
								</tr>
								<tr>
									<td><b>Deskripsi</b></td>
									<td>:</td>
									<td style="width: 80%"><?php echo $detail_pengaduan[0]->deskripsi ?></td>
								</tr>
								<tr>
									<td><b>Tindakan Pelapor</b></td>
									<td>:</td>
									<td style="width: 80%"><?php echo $detail_pengaduan[0]->tindaklanjut ?></td>
								</tr>
								<tr>
									<td><b>Kategori</b></td>
									<td>:</td>
									<td><?php echo $detail_pengaduan[0]->kategori ?></td>
								</tr>

								<!-- modal tambah -->
								<div class="modal modal-primary fade" id="modalKonfirmasi" style="margin-top: 5%;">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span></button>
													<center>
														<h4 class="modal-title">Anda yakin akan konfirmasi pengaduan?</h4>
													</center>
												</div>
												
												<form method="POST" action="<?php echo base_url('analis/konfirmasi/') ?>">
													<div class="modal-body">
														<div class="row">
															<div class="col-md-12">
																<div >
																	<label>Silahkan berikan laporan terlebih dahulu :</label>
																	<textarea class="form-control" type="text" name="keterangan" required></textarea>
																	<input type="hidden" name="id_pengaduan" value="<?php echo $data->id_pengaduan ?>">
																</div>
															</div>
														</div>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>

														<!-- <a style="margin-left: 40px;" href="<?php// echo base_url('analis/konfirmasi/'.$detail_pengaduan[0]->id_pengaduan); ?>" class="btn btn-success btn-md">&nbsp;&nbsp;&nbsp;YA&nbsp;&nbsp;&nbsp;</a> -->
														<input type="submit" class="btn btn-primary" value="Konfirmasi">
													</center>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- modal setting -->

							<!-- modal tambah -->
							<div class="modal modal-primary fade" id="modalKategori" style="margin-top: 5%">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span></button>
												<h4 class="modal-title">BUAT KATEGORI BARU</h4>
											</div>

											<form method="POST" action="<?php echo base_url('analis/buat_kategori') ?>">
												<div class="modal-body">
													<div class="row">
														<div class="col-md-12">
															<label>Kategori Baru :</label>
															<input type="hidden" name="id_pengaduan" value="<?php echo $detail_pengaduan[0]->id_pengaduan ?>">
															<input class="form-control" type="text" name="kategori">
														</div>
													</div>
												</div>
												<div class="modal-footer">
													<input type="submit" class="btn btn-primary" value="simpan">
												</div>
											</form>
										</div>
									</div>
								</div>
								<!-- modal setting -->
							</table>

							<!-- /.row (nested) -->
						</div>
						<!-- /.panel-body -->
					</div>
					<!-- /.panel -->
				</div>
				<!-- /.col-lg-12 -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /#page-wrapper -->
		
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

</div>

<!-- /#wrapper -->

<script src=<?php echo base_url("assets/vendor/jquery/jquery.min.js")?> ></script>
<script src=<?php echo base_url("assets/vendor/bootstrap/js/bootstrap.min.js")?> ></script>
<script src=<?php echo base_url("assets/vendor/metisMenu/metisMenu.min.js")?> ></script>
<script src=<?php echo base_url("assets/vendor/datatables/js/jquery.dataTables.min.js")?> ></script>
<script src=<?php echo base_url("assets/vendor/datatables-plugins/dataTables.bootstrap.min.js")?> ></script>
<script src=<?php echo base_url("assets/vendor/datatables-responsive/dataTables.responsive.js")?> ></script>
<script src=<?php echo base_url("assets/dist/js/sb-admin-2.js")?> ></script>
<script src=<?php echo base_url("assets/select2/dist/js/select2.full.min.js")?> ></script>
<script src=<?php echo base_url("assets/dist/jquery.min.js")?> ></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
	$(document).ready(function() {
		$('#dataTables-example').DataTable({
			responsive: true
		});
	});
</script>

<script type="text/javascript">
	$(document).ready(function(){ //Make script DOM ready
		$('#myselect').change(function() { //jQuery Change Function
			var opval = $(this).val(); //Get value from select element
			if(opval=="secondoption"){ //Compare it and if true
				$('#myModal').modal("show"); //Open Modal
			}
		});
	});
</script>

<script type="text/javascript">
	$(function(){
		
		$.ajaxSetup({
			type:"post",
			cache:false,
			dataType: "json"
		});
		
		
		$(document).on("click","td",function(){
			$(this).find("span[class~='caption']").hide();
			$(this).find("input[class~='editor']").fadeIn().focus();
		});
	});
</script>

<script type="text/javascript">
	$("#hilang").show().delay(2000).slideUp(400);
</script>

<script>
	$(function(){

		$('img').mouseenter(function(){
			$('img').css('width','70%');
		});
		$('img').mouseleave(function(){
			$('img').css('width','200');
		});});
	</script>

</body>

</html>
