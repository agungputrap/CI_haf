<div class="container">
	<div class="row">
		<div class="col-md-6 well">
		<?php 
	         	$attributes = array("class" => "form-horizontal", "id" => "jadwalform", "name" => "jadwalform");
	         	echo form_open("home_staff/proc_jadwal", $attributes);?>
	         	<fieldset>
	               <legend>Atas Nama</legend>
	               <div class="form-group">
	               <div class="row colbox">
	               <div class="col-lg-4 col-sm-4">
	                    <label for="txt_paid" class="control-label">Kelas</label>
	               </div>
	               <div class="col-lg-8 col-sm-8">
	                    <?php
	                    echo "<select name='kelas' form ='jadwalform' id='kelas'>";
	                    	echo "<option value='NULL'>--Pilih Kelas--</option>";
	                    	for ($i=0; $i < count($kelas) ; $i++) { 
	                    		$opt = "<option value='".$kelas[$i]['Kode']."'>".$kelas[$i]['Kode']."</option>";
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
	                    <label for="txt_paid" class="control-label">Shift</label>
	               </div>
	               <div class="col-lg-8 col-sm-8">
	                    <?php
	                    echo "<select name='shift' form ='jadwalform' id='shift'>";
	                    	echo "<option value='NULL'>--Pilih Shift--</option>";
	                    	for ($i=0; $i < count($shift) ; $i++) { 
	                    		$opt = "<option value='".$shift[$i]['Kode_Shift']."'>".$shift[$i]['Kode_Shift']."</option>";
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
	                    <label for="txt_paid" class="control-label">Guru</label>
	               </div>
	               <div class="col-lg-8 col-sm-8">
	                    <?php
	                    echo "<select name='guru' form ='jadwalform' id='guru'>";
	                    	echo "<option value='NULL'>--Pilih Guru--</option>";
	                    	for ($i=0; $i < count($guru) ; $i++) { 
	                    		$opt = "<option value='".$guru[$i]['Kode_Guru']."'>".$guru[$i]['Nama']."</option>";
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
	                    <label for="txt_paid" class="control-label">Guru</label>
	               </div>
	               <div class="col-lg-8 col-sm-8">
	                    <?php
	                    echo "<select name='guru' form ='jadwalform' id='guru'>";
	                    	echo "<option value='NULL'>--Pilih Guru--</option>";
	                    	for ($i=0; $i < count($guru) ; $i++) { 
	                    		$opt = "<option value='".$guru[$i]['Kode_Guru']."'>".$guru[$i]['Nama']."</option>";
	                    		echo $opt;
	                    	}
	                    echo "</select>";
	                    $show = true;
	                    ?>
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
	<div class="row">
		<table class='table table-striped'>
			<tr>
				<td><strong>Kelas</strong></td>
				<td><strong>Senin</strong></td>
				<td><strong>Selasa</strong></td>
				<td><strong>Rabu</strong></td>
				<td><strong>Kamis</strong></td>
				<td><strong>Jumat</strong></td>
				<td><strong>Sabtu</strong></td>
			</tr>
		</table>
	</div>
</div>
		
		