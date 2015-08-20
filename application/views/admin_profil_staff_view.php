<div class="container">
	<div class="row">
	<!--
		<div class="col-md-4 well">
			<p align='center'><strong> ADMIN</strong></p>
			<img src="<?php echo base_url("assets/images/admin.jpg\""); ?>" class="img-responsive img-haf" alt="Responsive image">
		</div>
	-->
		<div class="col-md-8">
			<?php echo $this->session->flashdata('msg'); ?>
			<h3>Jadwal Staff</h3>
				<table class='table table-striped'>
			<tr>
				<td align="center"><strong>Nama Staff</strong></td>
				<td align="center"><strong>Senin</strong></td>
				<td align="center"><strong>Selasa</strong></td>
				<td align="center"><strong>Rabu</strong></td>
				<td align="center"><strong>Kamis</strong></td>
				<td align="center"><strong>Jum'at</strong></td>
				<td align="center"><strong>Sabtu</strong></td>
				<td align="center"><strong>Minggu</strong></td>
				<td align="center"><strong>Tanggal Berlaku</strong></td>
			</tr>
				<?php
					foreach ($tabel as $jadwal) {
						$temp_id = $jadwal['Id'];
						echo "<tr>";
						echo "<td align='center'>".$jadwal['Nama']."</td>";
						echo "<td align='center'>".$jadwal['Monday']."</td>";
						echo "<td align='center'>".$jadwal['Tuesday']."</td>";
						echo "<td align='center'>".$jadwal['Wednesday']."</td>";
						echo "<td align='center'>".$jadwal['Thursday']."</td>";
						echo "<td align='center'>".$jadwal['Friday']."</td>";
						echo "<td align='center'>".$jadwal['Saturday']."</td>";
						echo "<td align='center'>".$jadwal['Sunday']."</td>";
						echo "<td align='center'>".$jadwal['Berlaku']."</td>";
						echo "<td align='center'><a class='btn btn-info' href='edit_jadwal_staff/$temp_id'>Edit</a></td>";
						echo "</tr>";
					}
				?>
			</table>
			<h5>Keterangan</h5>
			<h5>S01 : Shift 1 (09.00 - 12.00)</h5>
			<h5>S02 : Shift 2 (11.00 - 17.30)</h5>
			<h5>S03 : Shift 3 (13.00 - 17.30)</h5>
			<br>
			<br>
			<br>
			<h3>Ringkasan Absen</h3>
			<table class="table">
				<tr>
					<td align="center"><strong>Nama</strong></td>
					<td align="center"><strong>Jenis Kelamin</strong></td>
					<td align="center" colspan="2"><strong>Menu</strong></td>
				</tr>
				<?php
					foreach ($data_list_staff as $list) {
						echo "<tr>";
						$temp_nama_staff = '';
						$temp_id_staff = '';
					 	foreach ($list as $key => $value) {
					 		if($key=="Nama")
					 		{
					 			echo "<td align='center'><a href='profil_staff_detail/$value'>".$value."</a></td>";
					 			$temp_nama_staff = $value;
					 		}
					 		elseif ($key == "Id_Staff")
					 		{
					 			$temp_id_staff = $value;
					 		}
					 		elseif ($key == "Gaji_per_bulan"){

					 		}
					 		elseif($key == "Jenis_Kelamin")
					 		{
					 			echo "<td align='center'>".$value."</td>";
					 		}
					 	}
					 	echo "<td align='center'><a class='btn btn-default' href='laporan_absen_staff/$temp_id_staff'> Laporan Absen </a></td>";
					 	echo "<td align='center'><a class='btn btn-info' href='edit_data_staff/$temp_nama_staff'> Edit </a></td>";
					 	echo "</tr>";
					 } 
				?>
			</table>
		</div>
	</div>
</div>