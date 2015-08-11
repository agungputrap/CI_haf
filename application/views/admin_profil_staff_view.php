<div class="container">
	<div class="row">
	<!--
		<div class="col-md-4 well">
			<p align='center'><strong> ADMIN</strong></p>
			<img src="<?php echo base_url("assets/images/admin.jpg\""); ?>" class="img-responsive img-haf" alt="Responsive image">
		</div>
	-->
		<div class="col-md-8">
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
					foreach ($jadwal_staff as $list) {
						echo "<tr>";
						echo "<td align='center'>".$list['Nama']."</td>";

					 	foreach ($list as $key => $value) {
					 		if ($key = 'Hari') {
					 			if ($value='Monday') {
					 				echo "<td align='center'>".$list['Kode_Shift']."</td>";
					 				echo "<td align='center'></td>";
					 				echo "<td align='center'></td>";
					 				echo "<td align='center'></td>";
					 				echo "<td align='center'></td>";
					 				echo "<td align='center'></td>";
					 				echo "<td align='center'></td>";
					 				break;
					 			}
					 			elseif ($value='Tuesday') {
					 				echo "<td align='center'></td>";
					 				echo "<td align='center'>".$list['Kode_Shift']."</td>";
					 				echo "<td align='center'></td>";
					 				echo "<td align='center'></td>";
					 				echo "<td align='center'></td>";
					 				echo "<td align='center'></td>";
					 				echo "<td align='center'></td>";
					 				break;
					 			}
					 			elseif ($value='Wednesday') {
					 				echo "<td align='center'></td>";
					 				echo "<td align='center'></td>";
					 				echo "<td align='center'>".$list['Kode_Shift']."</td>";
					 				echo "<td align='center'></td>";
					 				echo "<td align='center'></td>";
					 				echo "<td align='center'></td>";
					 				echo "<td align='center'></td>";
					 				break;
					 			}
					 			elseif ($value='Thursday') {
					 				echo "<td align='center'></td>";
					 				echo "<td align='center'></td>";
					 				echo "<td align='center'></td>";
					 				echo "<td align='center'>".$list['Kode_Shift']."</td>";
					 				echo "<td align='center'></td>";
					 				echo "<td align='center'></td>";
					 				echo "<td align='center'></td>";
					 				break;
					 			}
					 			elseif ($value='Friday') {
					 				echo "<td align='center'></td>";
					 				echo "<td align='center'></td>";
					 				echo "<td align='center'></td>";
					 				echo "<td align='center'></td>";
					 				echo "<td align='center'>".$list['Kode_Shift']."</td>";
					 				echo "<td align='center'></td>";
					 				echo "<td align='center'></td>";
					 				break;
					 			}
					 			elseif ($value='Saturday') {
					 				echo "<td align='center'></td>";
					 				echo "<td align='center'></td>";
					 				echo "<td align='center'></td>";
					 				echo "<td align='center'></td>";
					 				echo "<td align='center'></td>";
					 				echo "<td align='center'>".$list['Kode_Shift']."</td>";
					 				echo "<td align='center'></td>";
					 				break;
					 			}
					 			elseif ($value='Sunday') {
					 				echo "<td align='center'></td>";
					 				echo "<td align='center'></td>";
					 				echo "<td align='center'></td>";
					 				echo "<td align='center'></td>";
					 				echo "<td align='center'></td>";
					 				echo "<td align='center'></td>";
					 				echo "<td align='center'>".$list['Kode_Shift']."</td>";
					 				break;
					 			}
					 			else{
					 				echo "<td align='center'></td>";
					 				echo "<td align='center'></td>";
					 				echo "<td align='center'></td>";
					 				echo "<td align='center'></td>";
					 				echo "<td align='center'></td>";
					 				echo "<td align='center'></td>";
					 				echo "<td align='center'></td>";
					 				break;
					 			}
					 		}
					 	}
					 	echo "<td align='center'>".$list['Tanggal_Mulai']."</td>";
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
			<h3>Profil Staff</h3>
			<table class="table">
				<tr>
					<td align="center"><strong>Kode Staff</strong></td>
					<td align="center"><strong>Nama</strong></td>
					<td align="center"><strong>Jenis Kelamin</strong></td>
					<td align="center"><strong>Bagian</strong></td>
					<td align="center" colspan="3"><strong>Menu</strong></td>
				</tr>
				<?php
					foreach ($data_list_staff as $list) {
						echo "<tr>";
						$temp_nomor_staff = "";
					 	foreach ($list as $key => $value) {
					 		if($key=="Nama")
					 		{
					 			echo "<td align='center'><a href='profil_staff_detail/$value'>".$value."</a></td>";
					 		}
					 		elseif ($key == "Id_Staff")
					 		{
					 			$temp_nomor_staff = $value;
					 			echo "<td align='center'>".$value."</td>";
					 		}
					 		elseif ($key == "Gaji_per_bulan"){

					 		}
					 		else
					 		{
					 			echo "<td align='center'>".$value."</td>";
					 		}
					 	}
					 	echo "<td align='center'><a class='btn btn-default' href='absen_staff/$temp_nomor_staff'> Laporan Absen </a></td>";
					 	echo "<td align='center'><a class='btn btn-info' href='edit_data_staff/$temp_nomor_staff'> Edit </a></td>";
					 	echo "<td align='center'><a class='btn btn-danger' href='hapus_staff/$temp_nomor_staff'> Hapus</a></td>";
					 	echo "</tr>";
					 } 
				?>
			</table>
		</div>
	</div>
</div>