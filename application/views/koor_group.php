<!DOCTYPE html>
<html lang="en">
	
	<head>
		
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
		
    <title>Admin</title>
		
    <link href=<?php echo base_url("assets/vendor/bootstrap/css/bootstrap.min.css")?> rel="stylesheet">
    <link href=<?php echo base_url("assets/vendor/metisMenu/metisMenu.min.css")?>  rel="stylesheet">
    <link href=<?php echo base_url("assets/vendor/datatables-plugins/dataTables.bootstrap.css")?>  rel="stylesheet">
    <link href=<?php echo base_url("assets/vendor/datatables-responsive/dataTables.responsive.css")?>  rel="stylesheet">
    <link href=<?php echo base_url("assets/dist/css/sb-admin-2.css")?> rel="stylesheet">
    <link href=<?php echo base_url("assets/vendor/font-awesome/css/font-awesome.min.css")?>  rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href=<?php echo base_url("assets/badge.css")?> >
		
	</head>
	
	<body>
		
    <div id="wrapper">
			
			<!-- Navigation -->
			<nav class="navbar navbar-default navbar-static-top" role="navigation" style="background-color: #005580">
				<div class="navbar-header">
					
					<a class="navbar-brand" style="color: #ffffff" >SI PENGADUAN</a>
				</div>
				<!-- /.navbar-header -->
				
				<ul class="nav navbar-top-links navbar-right">
					
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: #ffffff">
						<i class="fa fa-user fa-fw"></i> <?php echo $this->session->userdata('nama_pengguna'); ?></i>
					</a>
					<ul class="dropdown-menu dropdown-user">
						<li><a data-toggle="modal" data-target="#settingModal"><i class="fa fa-gear fa-fw"></i> Settings</a>
						</li>
						<li><a href="<?php echo base_url('logout_karyawan')?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
						</li>
					</li>
				</ul>
				<!-- /.dropdown-user -->
			</li>
			
		</ul>
		<!-- /.navbar-top-links -->
		
		<!--- user panel -->
		<section class="sidebar">
			<!-- <div class="pull-center image">
				<img src='<?php //echo base_url("img/user2.png")?>' class="img-circle" alt="User Image"  style="margin-left: 24%; margin-right: 24%; margin-top: 10%; width: 50%">
			</div> -->
		</section>
		
		<!-- MENU -->
		<div class="navbar-default sidebar" role="navigation">
			<div class="sidebar-nav navbar-collapse">
				<ul class="nav" id="side-menu">
					
					<li class="sidebar-search" >
						<div class="input-group custom-search-form" >
                                <b>Menu Sistem</b>
                            </div>
						<!-- /input-group -->
					</li>
					
					<!-- menu -->
					<li>
                            <a href=<?php echo base_url('koordinator')?>><i class="fa fa-envelope"></i>&nbsp; Pengaduan Masuk</a>
                        </li>
                        <li>
                            <a href=<?php echo base_url('koordinator/riwayat')?> ><i class="fa fa-table"></i> &nbsp;Riwayat Pengaduan</a>
                        </li>
                        <li>
                        <a href=<?php echo base_url('koordinator/grouping')?> style="color: #000000"><i class="fa fa-edit"></i>&nbsp;<b> Pengaduan Kejadian</b></a>
                    </li>
					<!-- menu -->
					
				</ul>
			</div>
			<!-- /.sidebar-collapse -->
		</div>
		<!-- /.navbar-static-side -->
	</nav>
	
	<!-- Page Content -->
	<div id="page-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Data Frekuensi Kejadian</h1>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Basic Form Element
						
					</div>
					<div class="panel-body">
						
						<ul class="nav nav-tabs" style="margin-bottom: 20px">
							<li class="active"><a data-toggle="tab" href="#mahasiswa">Pertama Kali</a></li>
							<li><a data-toggle="tab" href="#staf" >Beberapa kali</a></li>
						</ul>
						
						
						<div class="tab-content">
							<div id="mahasiswa" class="tab-pane fade in active">
								<!-- data mahasiswa -->
								<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
									<thead>
										<tr>
											<th>No</th>
											<th>Kategori</th>
											<th>Penyebab</th>
											<th>Efek</th>
											<th>Frekuensi</th>
										</tr>
									</thead>
									<tbody>
                                        <?php 
                                            $i = 1;
                                            foreach ($kejadian as $data)
                                            {
                                                if($data->kejadian == "pertama"){
                                            ?>
                                        <tr>
    										<td><?php echo $i; ?></td>
    										<td><?php echo $data->kategori ?></td>
    										<td><?php echo $data->penyebab ?></td>
    										<td><?php echo $data->efek ?></td>
    										<td><?php echo $data->kejadian ?></td>
                                        </tr>
                                        <?php
                                            $i++;
                                            }}
                                            ?>
									</tbody>
								</table>
							</div>
						
							
							<div id="staf" class="tab-pane fade">
								<!-- data beberapa kali -->
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kategori</th>
                                            <th>Penyebab</th>
                                            <th>Efek</th>
                                            <th>Frekuensi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $i = 1;
                                            foreach ($kejadian as $data)
                                            {
                                                if($data->kejadian == "beberapa kali"){
                                            ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $data->kategori ?></td>
                                            <td><?php echo $data->penyebab ?></td>
                                            <td><?php echo $data->efek ?></td>
                                            <td><?php echo $data->kejadian ?></td>
                                        </tr>
                                        <?php
                                            $i++;
                                            }}
                                            ?>
                                    </tbody>
                                </table>
							</div>
							
						</div>
						
						<!-- /.row (nested) -->
					</div>
					<!-- /.panel-body -->
				</div>
        <!-- /.panel -->
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
		
		<!-- modal setting -->
		<div class="modal modal-primary fade" id="settingModal" style="margin-top: 5%">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">RESET PASSWORD</h4>
					</div>
					
					<form method="POST" action="<?php echo base_url('admin/ubah_password') ?>">
						<div class="modal-body">
							<div class="row">
                <div class="col-md-12">
									<div class="form-group">
										<label>Password lama :</label>
										<input type="password" name="old" class="form-control" placeholder="Password Lama" required>
									</div>
									<div class="form-group">
										<label>Password baru :</label>
										<input type="password" name="new" class="form-control" placeholder="Password Baru" required>
									</div>
									<div class="form-group">
										<label>Ulangi password baru :</label>
										<input type="password" name="re_new" class="form-control" placeholder="Ulangi Password Baru" required>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-warning pull-left" data-dismiss="modal">Batal</button>
							<input type="submit" class="btn btn-primary" value="Simpan">
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- modal setting -->
		
	</div>
	<!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->

<script src=<?php echo base_url("assets/vendor/jquery/jquery.min.js")?> ></script>
<script src=<?php echo base_url("assets/vendor/bootstrap/js/bootstrap.min.js")?> ></script>
<script src=<?php echo base_url("assets/vendor/metisMenu/metisMenu.min.js")?> ></script>
<script src=<?php echo base_url("assets/vendor/datatables/js/jquery.dataTables.min.js")?> ></script>
<script src=<?php echo base_url("assets/vendor/datatables-plugins/dataTables.bootstrap.min.js")?> ></script>
<script src=<?php echo base_url("assets/vendor/datatables-responsive/dataTables.responsive.js")?> ></script>
<script src=<?php echo base_url("assets/dist/js/sb-admin-2.js")?> ></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
	$(document).ready(function() {
		$('#dataTables-example').DataTable({
			responsive: true
		});
	});
</script>

</body>

</html>
