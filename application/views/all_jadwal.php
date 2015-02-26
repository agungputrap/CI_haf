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
	                    <label for="txt_ruangan" class="control-label">Ruangan</label>
	               </div>
	               <div class="col-lg-8 col-sm-8">
	                    <input class="form-control" id="txt_ruangan" name="txt_ruangan" placeholder="Ruangan" type="text" value="<?php echo set_value('txt_ruangan'); ?>" />
	                    <span class="text-danger"><?php echo form_error('txt_ruangan'); ?></span>
	               </div>
	               </div>
	               </div>

	               <div class="form-group">
	               <div class="row colbox">
	               <div class="col-lg-4 col-sm-4">
	                    <label for="txt_paid" class="control-label">Hari</label>
	               </div>
	               <div class="col-lg-8 col-sm-8">
	               		<select name='hari' form ='jadwalform' id='hari'>
	               			<option value='NULL'>--Pilih Hari--</option>
	               			<option value='Monday'>Senin</option>
	               			<option value='Tueasday'>Selasa</option>
	               			<option value='Wednesday'>Rabu</option>
	               			<option value='Thursday'>Kamis</option>
	               			<option value='Friday'>Jumat</option>
	               			<option value='Saturday'>Sabtu</option>
	               			<option value='Sunday'>Minggu</option>
	               		</select>
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
				<th>Kelas</th>
				<th>Senin</th>
				<th>Selasa</th>
				<th>Rabu</th>
				<th>Kamis</th>
				<th>Jumat</th>
				<th>Sabtu</th>
				<th>Minggu</th>
			</tr>
			<?php
			/*
			var_dump($tabel_jadwal);
			exit();
			*/
			foreach ($tabel_jadwal as $class => $day) {
				echo "<tr>";
					echo "<td rowspan='2'>".@$class."</td>";
				for ($i=0; $i < 2 ; $i++) { 
					for ($j=0; $j < 7; $j++) { 
						if (empty(@$day[$i])) {
							echo "<td></td>";
						} else {
							echo "<td>".@$day[$i][$j]['Kode_Guru']."</td>";
						}
					}
					echo "</tr>";
				}
				
			}
			?>
		</table>
	</div>
</div>
		
		