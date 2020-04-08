<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Profil</title>
	<link href="https://cdn.jsdelivr.net/npm/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet"
		type="text/css">
	<link href="<?= base_url(); ?>assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/profil.css">
	
</head>

<body style="background: white; background-opacity:0.3;">

<!-- START -->
<!-- Just an image -->
<nav class="navbar navbar-light bg-light" style="background-color: rgba(6, 12, 34, 0.98) !important;">
  <a class="navbar-brand ml-4" href="#">
  <img src="<?= base_url(); ?>assets/img/logo/logo sync white.png" width="120px" alt="" title="">
  </a>
  <div class="dropdown">
  <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fa fa-fw fa-user"></i>
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="<?= base_url('log/logout') ?>">Logout</a>
  </div>
</div>
</nav>
<!-- END -->

	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="col-md-12 user">
				<!--  style="background: white; color:black;" -->
					<div class="row">
						<div class="col-md-12 image">
							<img src="<?= base_url(); ?>assets/img/user.png" width="100" height="100" alt="">
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-12 text-center mb-2">
							<h2><?= $_SESSION['nama_user'] ?></h2>
							<span><?= $_SESSION['email'] ?></span>
						</div>
					</div>
					<div class="row mt-2 mb-4">
						<div class="col-md-12">
							<a class="btn btn-success home" href="<?= base_url('home/home') ?>">Back to Home</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-8">
				<h3 class="mt-3">History Transaksi</h3>
				<table class="table">
					<thead>
						<tr>
							<th>Name</th>
							<th>Qty</th>
							<th> Date</th>
							<th>Status</th>
							<th>Ticket</th>
						</tr>
					</thead>
					<tbody>
						<?php
						if(count($transaksi) > 0) { 
							foreach ($transaksi as $trs ) {?>
						<tr>
							<td><?= $_SESSION['nama_user']; ?></td>
							<td><?= $trs['qty']; ?></td>
							<td><?= date('d M Y', $trs['tanggal']) ?></td>
							<?php if($trs['status']=='selesai'){  ?>
							<td><b class="btn btn-sm btn-primary"><?= $trs['status']; ?></b></td>
							<?php }else{  ?>
							<td><b class="btn btn-sm btn-warning"><?= $trs['status']; ?></b></td>
							<?php }?>
							<?php if($trs['status']=='selesai'){  ?>
							<td><a href="<?= base_url('laporan/index'); ?>/<?= $trs['id_transaksi'] ?>" target="_blank" class="btn btn-sm btn-info"><i class="fa fa-ticket"></i> <b>Download Ticket</b></a></td>
							<?php }else{  ?>
							<td><a href="" class="btn btn-sm btn-light text-danger"><i class="fa fa-exclamation"></i><b> Selesaikan pembayaran</b></a></td>
							<?php }?>
						</tr>

						<?php }} else { ?>
						<tr>
							<td class="text-center pt-3" colspan="5">
								<div style="margin-bottom: -7px !important;" class="alert alert-danger" role="alert">
									Belum ada data pembelian!
								</div>
							</td>
						</tr>

						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/vanilla-datatables@latest/dist/vanilla-dataTables.min.js"
	type="text/javascript"></script>
<script>
	var table = new DataTable("table");

</script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 <script src="https://kit.fontawesome.com/c3a6dded80.js" crossorigin="anonymous"></script>

</html>
