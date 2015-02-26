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
<!-- isinya -->
<div class="container">
	<div class="row">
		<div class="col-md-4 well">
			<h1 align="center"> <?php echo ($data[0]['Nama']) ?> </h1>
			<img src="<?php echo base_url("assets/images/".$data[0]['Username'].".jpg\""); ?>" class="img-responsive img-haf" alt="Responsive image">
		</div>
		<div class="col-md-6 col-md-offset-1 well">
			<?php $attributes = array("class" => "form-horizontal", "id" => "rubahprofilform", "name" => "rubahprofilform");
				echo form_open_multipart('home_admin/proc_rubah_profil_siswa/'.$data[0]['Username'], $attributes);?>
			<fieldset>
				<legend>EDIT PROFIL</legend>
					<div class="form-group">
		                <div class="row colbox">
			                <div class="col-lg-4 col-sm-4">
			                    <label for="nama_staff" class="control-label">Nama</label>
			                </div>
			                <div class="col-lg-8 col-sm-8">
			                    <input class="form-control" id="txt_nama" name="txt_nama" type="text" value="<?php echo set_value('txt_nama'); ?>" />
			                </div>
		                </div>
	            	</div>
					<div class="form-group">
		                <div class="row colbox">
			                <div class="col-lg-4 col-sm-4">
			                    <label for="txt_staff" class="control-label">Password</label>
			                </div>
			                <div class="col-lg-8 col-sm-8">
			                    <input class="form-control" id="txt_password" name="txt_password" placeholder="rubah password disini" type="text" value="<?php echo set_value('txt_password'); ?>" />
			                </div>
		                </div>
	            	</div>
	            	<div class="form-group">
		                <div class="row colbox">
			                <div class="col-lg-4 col-sm-4">
			                    <label for="jenis_kelamin_staff" class="control-label">Jenis Kelamin</label>
			                </div>
			                <div class="col-lg-8 col-sm-8">
			                    <input class="form-control" id="txt_jenis_kelamin" name="txt_jenis_kelamin" type="text" value="<?php echo set_value('txt_jenis_kelamin'); ?>" />
			                </div>
		                </div>
	            	</div>
	            	<div class="form-group">
		                <div class="row colbox">
			                <div class="col-lg-4 col-sm-4">
			                    <label for="bagian" class="control-label">Program</label>
			                </div>
			                <div class="col-lg-8 col-sm-8">
			                    <input class="form-control" id="txt_program" name="txt_program" type="text" value="<?php echo set_value('txt_program'); ?>" />
			                </div>
		                </div>
	            	</div>
	            	<div class="form-group">
		                <div class="row colbox">
			                <div class="col-lg-4 col-sm-4">
			                    <label for="gaji" class="control-label">Kode Kelas</label>
			                </div>
			                <div class="col-lg-8 col-sm-8">
			                    <input class="form-control" id="txt_kode_kelas" name="txt_kode_kelas" type="text" value="<?php echo($data[0]['Kode_Kelas']); ?>" />
			                </div>
		                </div>
	            	</div>
	            	<div class="form-group">
		                <div class="row colbox">
			                <div class="col-lg-4 col-sm-4">
			                    <label for="txt_alamat" class="control-label">Alamat</label>
			                </div>
			                <div class="col-lg-8 col-sm-8">
			                    <textarea name="txt_alamat" form ="rubahprofilform" rows="4" cols="50"></textarea>
			                </div>
		                </div>
	                </div>
	                <div class="form-group">
		                <div class="row colbox">
			                <div class="col-lg-4 col-sm-4">
			                    <label for="nama_siswa" class="control-label">No. Telepon</label>
			                </div>
			                <div class="col-lg-8 col-sm-8">
			                    <input class="form-control" id="txt_telp" name="txt_telp" placeholder="rubah no. telepon disini" type="text" value="<?php echo set_value('txt_telp'); ?>" />
			                </div>
		                </div>
	            	</div>
	            	 <div class="form-group">
		                <div class="row colbox">
			                <div class="col-lg-4 col-sm-4">
			                    <label for="nama_siswa" class="control-label">Gambar Profil</label>
			                </div>
			                <div class="col-lg-8 col-sm-8">
			                   <input type='file' name='userfile' size='20' />
			                </div>
		                </div>
	            	</div>
	            	<div class="form-group">
		                <div class="col-lg-12 col-sm-12 text-center">
			                <input id="btn_rubah" name="btn_rubah" type="submit" class="btn btn-default" value="Rubah" />
			                <input id="btn_cancel" name="btn_cancel" type="submit" class="btn btn-default" value="Cancel" />
		                </div>
	                </div>

	            <?php echo form_close(); ?>
	         	<?php echo $this->session->flashdata('msg'); ?>
			</fieldset>
		</div>
	</div>
</div>