<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login Form</title>
	<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
	<link rel="stylesheet" href="<?php echo base_url("assets/css/hafiyan.css"); ?>" />
	<style type="text/css">
		.colbox{
			margin-left: 0px;
			margin-right: 0px;
		}
		.top5 { margin-top:5px; }
		.top7 { margin-top:7px; }
		.top10 { margin-top:10px; }
		.top15 { margin-top:15px; }
		.top17 { margin-top:17px; }
		.top30 { margin-top:30px; }
		.top50 { margin-top:50px; }
	</style>
</head>
<body>
	<div class ="container">
		<div class="row top7">
			<div class="col-lg-4 col-sm-4">
				<img src="<?php echo base_url("assets/images/ssc_logo3.jpg"); ?>" class="img-rounded" alt="Responsive image">
			</div>
			<div class="col-lg-8 col-sm-8">
				<div class="row top50">
					<div class="col-lg-2 col-sm-2">
						<?php if (strcmp($halaman,"beranda")== 0) {
							echo "<a class='btn active btn-success' href='home'>Beranda</a>";
						} else {
							echo "<a class='btn btn-success' href='home'>Beranda</a>";
						} ?>
					</div>
					<div class="col-lg-2 col-sm-2">
						<div class="dropdown">
  							<button class="btn btn-success dropdown-toggle" type="button" id="MenuTransaksi" data-toggle="dropdown" aria-expanded="true">
    						Transaksi
    						<span class="caret"></span>
  							</button>
  							<ul class="dropdown-menu" role="menu" aria-labelledby="MenuTransaksi">
    							<li role="presentation"><a role="menutransaksi" tabindex="-1" href="pendaftaran">Pendaftaran Siswa</a></li>
    							<li role="presentation"><a role="menutransaksi" tabindex="-1" href="bayaran">Pembayaran</a></li>
    							<li role="presentation"><a role="menutransaksi" tabindex="-1" href="cari_nama">Cari Nama Siswa</a></li>
  							</ul>
						</div>
					</div>
					<div class="col-lg-2 col-sm-2">
						<div class="dropdown">
  							<button class="btn btn-success dropdown-toggle" type="button" id="MenuKegiatan" data-toggle="dropdown" aria-expanded="true">
    						Kegiatan
    						<span class="caret"></span>
  							</button>
  							<ul class="dropdown-menu" role="menu" aria-labelledby="MenuKegiatan">
    							<li role="presentation"><a role="menutransaksi" tabindex="-1" href="mengabsen">Mengabsen</a></li>
    							<li role="presentation" class="disabled"><a role="menuitem" tabindex="-1" href="#">Pengaturan Siswa Baru</a></li>
    							<li role="presentation"><a role="menuitem" tabindex="-1" href="see_jadwal">Mengatur Jadwal</a></li>
    							<li role="presentation" class="disabled"><a role="menuitem" tabindex="-1" href="#">Upload Hasil TO</a></li>
  							</ul>
						</div>
					</div>
					<div class="col-lg-2 col-sm-2">
						<?php if (strcmp($halaman,"absensi")== 0) {
							echo "<a class='btn active btn-success' href='absensi'>Ringkasan Absen</a>";
						} else {
							echo "<a class='btn btn-success' href='absensi'>Ringkasan Absen</a>";
						} ?>
					</div>
					<div class="col-lg-2 col-sm-2">
					</div>
					<a href="logout" class="btn pull-right btn-danger btn-primary btn-lg" id-"btn_logout" name="btn_logout" value="Logout">Logout</a>
				</div>

			</div>
		</div>
	</div>		
<hr/>
