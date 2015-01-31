	<div class="container">
    	<div class="row">
    		<div class="col-lg-4 col-sm-4 ">
    		</div>
         	<div class="col-lg-4 col-sm-4 well">
	         	<?php 
	         	$attributes = array("class" => "form-horizontal", "id" => "loginform", "name" => "loginform");
	         	echo form_open("login/index", $attributes);?>
	         	<fieldset>
	               <legend>Login</legend>
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
	               <div class="col-lg-12 col-sm-12 text-center">
	                    <input id="btn_login" name="btn_login" type="submit" class="btn btn-default" value="Login" />
	                    <input id="btn_cancel" name="btn_cancel" type="reset" class="btn btn-default" value="Cancel" />
	                    <a href="absen/index">isi absen ? </a>
	               </div>
	               </div>
	         	</fieldset>
	         	<?php echo form_close(); ?>
	         	<?php echo $this->session->flashdata('msg'); ?>
         	</div>
         	<div class="col-lg-3 col-sm-3 col-lg-offset-1 col-sm-offset-1">
         		<h2 align="center">Clock </h2>
         		<hr/>
         		<div id="clockDisplay" class="clockStyle col-lg-offset-3"><script type="text/javascript" src="<?php echo base_url("assets/js/clock.js"); ?>"></script></div>
         	</div>
    	</div>
	</div>
