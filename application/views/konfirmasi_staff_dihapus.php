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
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<!--bagi jadi 3 bagian--> 
			<div class="col-lg-4 col-sm-4">
			</div>
			<div class="col-lg-8 col-sm-8">
				<div class="col-lg-4 col-sm-4">
					<img src="<?php echo base_url("assets/images/ssc_logo.jpg"); ?>" alt="Responsive image" class="img-rounded">
				</div>
				<div class="col-lg-5 col-sm-5">
					<h3>Sony Sugema College</h3>
					<p>Jln Cimanuk 388, Desa Jayawaras, Kecamatan Tarogong kidul, Kabupaten Garut</p>
					<p>021-89239892</p>
				</div>   
         	</div>
		</div>
	</div>
	<hr/>
	<div class="col-md-4 ">
	</div>
	<div class="col-md-4 ">
		<h2>Berhasil dihapus</h2>
		<a class='btn btn-success' href="#">Kembali</a>
	</div>

	<div class="navbar navbar-default navbar-fixed-bottom">
		<div class="container">
			<p class="navbar-text">Site build by Agung & David & Hafiyyan</p>
		</div>
	</div>
</body>

<!--load jQuery library-->
<script type="text/javascript" src="<?php echo base_url("assets/js/jQuery-1.11.2.min.js"); ?>"></script>
<!-- bootstrap-->
<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/clock.js"); ?>"></script>
<script>
	if ($('#program').val()===('NULL')){
		$("b").remove();
	};
	else{
		$("p").append(" <b>Appended text</b>.");
	}
</script>
</html>
</html>