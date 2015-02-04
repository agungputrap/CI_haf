<div class="container">
	<div class="row">
		<div class="col-md-4 well">
			<h1> <?php echo ($user) ?> </h1>
			<img src="<?php echo base_url("assets/images/bonie.jpg"); ?>" class="img-responsive" alt="Responsive image">
		</div>
		<div class="col-md-6 col-md-offset-1">
			<div class='row'>;
				<?php 
	         	$attributes = array("class" => "form-horizontal", "id" => "daftarform", "name" => "daftarform");
	         	echo form_open("home_staff/proc_daftar", $attributes);?>
	         	<fieldset>
	               <legend>Pendaftaran Siswa</legend>
	               <div class="form-group">
	               <div class="row colbox">
	               <div class="col-lg-4 col-sm-4">
	                    <label for="nama_siswa" class="control-label">Nama Siswa</label>
	               </div>
	               <div class="col-lg-8 col-sm-8">
	                    <input class="form-control" id="txt_nama" name="txt_nama" placeholder="Nama" type="text" value="<?php echo set_value('txt_nama'); ?>" />
	                    <span class="text-danger"><?php echo form_error('nama_siswa'); ?></span>
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
	                    <span class="text-danger"><?php echo form_error('txt_password'); ?></span>
	               </div>
	               </div>
	               </div>

	               <div class="form-group">
	               <div class="row colbox">
	               <div class="col-lg-4 col-sm-4">
	                    <label for="txt_username" class="control-label">Alamat</label>
	               </div>
	               <div class="col-lg-8 col-sm-8">
	                    <textarea name="txt_alamat" form ="daftarform" rows="4" cols="50"></textarea>
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
	         	<?php echo $this->session->flashdata('msg'); ?>
			</div>
		</div>
	</div>
</div>