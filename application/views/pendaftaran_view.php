<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-1">
			<div class='row'>;
				<?php 
	         	$attributes = array("class" => "form-horizontal", "id" => "daftarform", "name" => "daftarform");
	         	echo form_open("home_staff/proc_daftar", $attributes);?>
	         	<?php echo $this->session->flashdata('msg'); ?>
	         	<fieldset>
	               <legend>Pendaftaran Siswa</legend>
	               <div class="form-group">
	               <div class="row colbox">
	               <div class="col-lg-4 col-sm-4">
	                    <label for="nama_siswa" class="control-label">Nama Siswa</label>
	               </div>
	               <div class="col-lg-8 col-sm-8">
	                    <input class="form-control" id="txt_nama" name="txt_nama" placeholder="Nama" type="text" value="<?php echo set_value('txt_nama'); ?>" />
	               </div>
	               </div>
	               </div>

	               <div class="form-group">
	               <div class="row colbox">
	               <div class="col-lg-4 col-sm-4">
	                    <label for="txt_sex" class="control-label">Jenis Kelamin</label>
	               </div>
	               <div class="col-lg-8 col-sm-8">
	                    <select name='sex' form ='daftarform' id='sex'>
	                    	<option value='Laki Laki'>Laki - Laki</option>
	                    	<option value='Perempuan'>Perempuan</option>
	                    </select>
	               </div>
	               </div>
	               </div>

	               <div class="form-group">
	               <div class="row colbox">
	               <div class="col-lg-4 col-sm-4">
	                    <label for="txt_username" class="control-label">Username</label>
	               </div>
	               <div class="col-lg-8 col-sm-8">
	                    <input class="form-control" id="txt_username" name="txt_username" placeholder="Username" type="text" value="<?php echo set_value('txt_username'); ?>" />
	                    Isi dengan 5 - 24 Karakter
	                    <span class="text-danger"><?php echo form_error('txt_username'); ?></span>
	               </div>
	               </div>
	               </div>
	               
	               <div class="form-group">
	               <div class="row colbox">
	               <div class="col-lg-4 col-sm-4">
	               <label for="txt_password" class="control-label">Password</label>
	               </div>
	               <div class="col-lg-8 col-sm-8">
	                    <input class="form-control" id="txt_password" name="txt_password" placeholder="Password" type="password" value="<?php echo set_value('txt_password'); ?>" />
	                    Isi dengan 5 - 24 Karakter
	                    <span class="text-danger"><?php echo form_error('txt_password'); ?></span>
	               </div>
	               </div>
	               </div>

	               <div class="form-group">
	               <div class="row colbox">
	               <div class="col-lg-4 col-sm-4">
	                    <label for="txt_alamat" class="control-label">Alamat</label>
	               </div>
	               <div class="col-lg-8 col-sm-8">
	                    <textarea name="txt_alamat" form ="daftarform" rows="4" cols="50"></textarea>
	               </div>
	               </div>
	               </div>

	               <div class="form-group">
	               <div class="row colbox">
	               <div class="col-lg-4 col-sm-4">
	                    <label for="txt_telp" class="control-label">No Telepon</label>
	               </div>
	               <div class="col-lg-8 col-sm-8">
	                    <input class="form-control" id="txt_telp" name="txt_telp" placeholder="Telephone" type="text" value="<?php echo set_value('txt_telp'); ?>" />
	                    <span class="text-danger"><?php echo form_error('txt_telp'); ?></span>
	               </div>
	               </div>
	               </div>
	               
	               <div class="form-group">
	               <div class="row colbox">
	               <div class="col-lg-4 col-sm-4">
	               <label for="txt_staff" class="control-label">Staff Pendaftar</label>
	               </div>
	               <div class="col-lg-8 col-sm-8">
	               		<input type="hidden" name="txt_staff" value="<?php echo ($data[0]['Nama']); ?>">
	                    <div id="namastaff"><?php echo ($data[0]['Nama']); ?></div>
	               </div>
	               </div>
	               </div>

	               <div class="form-group">
	               <div class="row colbox">
	               <div class="col-lg-4 col-sm-4">
	               <label for="program" class="control-label">Program</label>
	               </div>
	               <div class="col-lg-8 col-sm-8">
	                    <?php
	                    echo "<select name='program' form ='daftarform' id='program'>";
	                    	echo "<option value='NULL'>--Pilih Program--</option>";
	                    	for ($i=0; $i < count($program) ; $i++) { 
	                    		$opt = "<option value='".$program[$i]."'>".$program[$i]."</option>";
	                    		echo $opt;
	                    	}
	                    echo "</select>";
	                    $show = true;
	                    ?>
	               </div>
	               </div>
	               </div>

	               <div class="form-group">
	               <div class="row colbox">
	               <div class="col-lg-4 col-sm-4">
	               <label for="biaya" class="control-label"></label>
	               </div>
	               <div class="col-lg-8 col-sm-8">
						<?php
	                  
	                    echo "<input type='radio' name='biaya' value='semester'>1 Semester";
						echo "<br>";
						echo "<input type='radio' name='biaya' value='tahun'>1 Tahun";
						echo "<br>";
	                    
	                    ?>

	               </div>
	               </div>
	               </div>

	               <div class="form-group">
	               <div class="row colbox">
	               <div class="col-lg-4 col-sm-4">
	                    <label for="txt_username" class="control-label">Asal Sekolah</label>
	               </div>
	               <div class="col-lg-8 col-sm-8">
	                    <input class="form-control" id="txt_asal" name="txt_asal" placeholder="Asal Sekolah" type="text" value="<?php echo set_value('txt_asal'); ?>" />
	                    Isi dengan 5 - 24 Karakter
	                    <span class="text-danger"><?php echo form_error('txt_asal'); ?></span>
	               </div>
	               </div>
	               </div>

	               <div class="form-group">
	               <div class="col-lg-12 col-sm-12 text-center">
	                    <input id="btn_daftar" name="btn_daftar" type="submit" class="btn btn-default" value="Daftar" />
	                    <input id="btn_cancel" name="btn_cancel" type="reset" class="btn btn-default" value="Cancel" />
	               </div>
	               </div>
	         	</fieldset>
	         	<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>
<div class="navbar navbar-default navbar-bottom">
		<div class="container">
			<p class="navbar-text">Site build by Agung & Hafiyyan</p>
		</div>
	</div>
</body>
<!--load jQuery library-->
<script type="text/javascript" src="<?php echo base_url("assets/js/jQuery-1.11.2.min.js"); ?>"></script>
<!-- bootstrap-->
<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/clock.js"); ?>"></script>
</html>
</html>