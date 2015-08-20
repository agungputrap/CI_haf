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
			<h5 align="center">Jadwal <?php echo ($data[0]['Nama']) ?> </h5>
			<h5 align="center">Saat Ini </h5>
			<table class='table table-striped'>
			<tr>
				<td align="center"><strong>Hari</strong></td>
				<td align="center"><strong>Shift</strong></td>
			</tr>
				<?php
					for($index = 0; $index < count($hari); $index++) {
						echo "<tr>";
						echo "<td align='center'>".$hari[$index][0]."</a></td>";
						foreach ($jadwal as $value) {
							if($value['Hari'] == $hari[$index][1]){
								if ($value['Kode_Shift'] == 'S01') {
									echo "<td align='center'>S01/S03</a></td>";
									break;
								}
								elseif ($value['Kode_Shift'] == 'S02') {
									echo "<td align='center'>S02</a></td>";
									break;
								}
								else
									echo "<td></td>";
							}
						}
						echo "</tr>";
					}
				?>
			</table>
		</div>
		<div class="col-md-6 col-md-offset-1 well">
			<?php $attributes = array("class" => "form-horizontal", "id" => "rubahjadwalform", "name" => "rubahprofilform");
				echo form_open_multipart('home_admin/proc_rubah_jadwal_staff/'.$data[0]['Id_Staff'], $attributes);?>
			<fieldset>
				<legend>Edit Jadwal</legend>
					<div class="form-group">
		                <div class="row colbox">
			                <div class="col-lg-4 col-sm-4">
			                    <label for="monday" class="control-label">Jadwal Senin</label>
			                </div>
			                <div class="col-lg-8 col-sm-8">
			                    <select name='monday' form ='rubahjadwalform' id='monday'>
			                    	<option value='0'>Kosong</option>
			                    	<option value='1'>S01/S03</option>
			                    	<option value='2'>S02</option>
			                    </select>
			                </div>
		                </div>
	            	</div>
	            	<div class="form-group">
		                <div class="row colbox">
			                <div class="col-lg-4 col-sm-4">
			                    <label for="tuesday" class="control-label">Jadwal Selasa</label>
			                </div>
			                <div class="col-lg-8 col-sm-8">
			                    <select name='tuesday' form ='rubahjadwalform' id='tuesday'>
			                    	<option value='0'>Kosong</option>
			                    	<option value='1'>S01/S03</option>
			                    	<option value='2'>S02</option>
			                    </select>
			                </div>
		                </div>
	            	</div>
	            	<div class="form-group">
		                <div class="row colbox">
			                <div class="col-lg-4 col-sm-4">
			                    <label for="wednesday" class="control-label">Jadwal Rabu</label>
			                </div>
			                <div class="col-lg-8 col-sm-8">
			                    <select name='wednesday' form ='rubahjadwalform' id='wednesday'>
			                    	<option value='0'>Kosong</option>
			                    	<option value='1'>S01/S03</option>
			                    	<option value='2'>S02</option>
			                    </select>
			                </div>
		                </div>
	            	</div>
	            	<div class="form-group">
		                <div class="row colbox">
			                <div class="col-lg-4 col-sm-4">
			                    <label for="thursday" class="control-label">Jadwal Kamis</label>
			                </div>
			                <div class="col-lg-8 col-sm-8">
			                    <select name='thursday' form ='rubahjadwalform' id='thursday'>
			                    	<option value='0'>Kosong</option>
			                    	<option value='1'>S01/S03</option>
			                    	<option value='2'>S02</option>
			                    </select>
			                </div>
		                </div>
	            	</div>
	            	<div class="form-group">
		                <div class="row colbox">
			                <div class="col-lg-4 col-sm-4">
			                    <label for="friday" class="control-label">Jadwal Jumat</label>
			                </div>
			                <div class="col-lg-8 col-sm-8">
			                    <select name='friday' form ='rubahjadwalform' id='friday'>
			                    	<option value='0'>Kosong</option>
			                    	<option value='1'>S01/S03</option>
			                    	<option value='2'>S02</option>
			                    </select>
			                </div>
		                </div>
	            	</div>
	                <div class="form-group">
		                <div class="row colbox">
			                <div class="col-lg-4 col-sm-4">
			                    <label for="saturday" class="control-label">Jadwal Sabtu</label>
			                </div>
			                <div class="col-lg-8 col-sm-8">
			                    <select name='saturday' form ='rubahjadwalform' id='saturday'>
			                    	<option value='0'>Kosong</option>
			                    	<option value='1'>S01/S03</option>
			                    	<option value='2'>S02</option>
			                    </select>
			                </div>
		                </div>
	            	</div>
	            	<div class="form-group">
		                <div class="row colbox">
			                <div class="col-lg-4 col-sm-4">
			                    <label for="sunday" class="control-label">Jadwal Minggu</label>
			                </div>
			                <div class="col-lg-8 col-sm-8">
			                    <select name='sunday' form ='rubahjadwalform' id='sunday'>
			                    	<option value='0'>Kosong</option>
			                    	<option value='1'>S01/S03</option>
			                    	<option value='2'>S02</option>
			                    </select>
			                </div>
		                </div>
	            	</div>
	            	<div class="form-group">
		                <div class="col-lg-12 col-sm-12 text-center">
			                <input id="btn_rubah" name="btn_rubah" type="submit" class="btn btn-info" value="Rubah" />
			                <input id="btn_cancel" name="btn_cancel" type="submit" class="btn btn-danger" value="Cancel" />
		                </div>
	                </div>

	            <?php echo form_close(); ?>
	         	<?php echo $this->session->flashdata('msg'); ?>
			</fieldset>
		</div>
	</div>
</div>