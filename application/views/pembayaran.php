<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-1">
			<div class='row'>;
				<?php 
	         	$attributes = array("class" => "form-horizontal", "id" => "daftarform2", "name" => "daftarform2");
	         	echo form_open("home_staff/bayaran", $attributes);?>
	         	<fieldset>
	               <legend>Atas Nama</legend>
	               <div class="form-group">
	               <div class="row colbox">
	               <div class="col-lg-4 col-sm-4">
	                    <label for="txt_paid" class="control-label">Nama</label>
	               </div>
	               <div class="col-lg-8 col-sm-8">
	                    <input class="form-control" id="txt_nama" name="txt_nama" placeholder="" type="text" value="<?php echo set_value('txt_nama'); ?>" />
	                    <span class="text-danger"><?php echo form_error('txt_nama'); ?></span>
	               </div>
	               </div>
	               </div>

	               <div class="form-group">
	               <div class="col-lg-12 col-sm-12 text-center">
	                    <input id="btn_daftar" name="btn_proses" type="submit" class="btn btn-default" value="Proses" />
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