<div class="container">
	<div class="row">
		<div class="col-md-4 well">
			<h1 align="center"> <?php echo ($data[0]['Nama']) ?> </h1>
			<img src="<?php echo base_url("assets/images/".$data[0]['Username'].".jpg\""); ?>" class="img-responsive img-haf" alt="Responsive image">
		</div>
		<div class="col-md-6 col-md-offset-1 well">
			<?php $attributes = array("class" => "form-horizontal", "id" => "rubahprofilform", "name" => "rubahprofilform");
				echo form_open_multipart("home_siswa/proc_rubah_profil", $attributes);?>
			<fieldset>
				<legend>RUBAH PROFIL</legend>
					<div class="form-group">
		                <div class="row colbox">
			                <div class="col-lg-4 col-sm-4">
			                    <label for="nama_siswa" class="control-label">Password</label>
			                </div>
			                <div class="col-lg-8 col-sm-8">
			                    <input class="form-control" id="txt_password" name="txt_password" placeholder="rubah password disini" type="text" value="<?php echo set_value('txt_password'); ?>" />
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
			                <input id="btn_cancel" name="btn_cancel" type="reset" class="btn btn-default" value="Cancel" />
		                </div>
	                </div>

	            <?php echo form_close(); ?>
	         	<?php echo $this->session->flashdata('msg'); ?>
			</fieldset>
		</div>
	</div>
</div>