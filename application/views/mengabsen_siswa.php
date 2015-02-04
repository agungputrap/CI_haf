<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-1">
			<div class='row'>;
				<?php 
	         	$attributes = array("class" => "form-horizontal", "id" => "absenform", "name" => "absenform");
	         	echo form_open("home_staff/proc_mengabsen", $attributes);?>
	         	<fieldset>
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
	               <label for="namastaff" class="control-label">Staff Pengabsen</label>
	               </div>
	               <div class="col-lg-8 col-sm-8">
	               		<input type="hidden" name="txt_staff" value="<?php echo ($data[0]['Nama']); ?>">
	                    <div id="namastaff"><?php echo ($data[0]['Nama']); ?></div>
	               </div>
	               </div>
	               </div>

	               <div class="form-group">
	               <div class="col-lg-12 col-sm-12 text-center">
	                    <input id="btn_daftar" name="btn_absen" type="submit" class="btn btn-success" value="Absen" />
	                    <input id="btn_cancel" name="btn_cancel" type="reset" class="btn btn-danger" value="Cancel" />
	               </div>
	               </div>
	         	</fieldset>
	         	<?php echo form_close(); ?>
	         	<?php echo $this->session->flashdata('msg'); ?>
			</div>
		</div>
	</div>
</div>